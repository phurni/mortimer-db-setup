<?php namespace Mortimer\DbSetup\Commands;

use Illuminate\Console\Command;

abstract class DbBase extends Command {

    protected function doStatement($statement, $data)
    {
        // Workaround, using DB::Statement with bindings fails for an unknown reason
        $sql = str_replace('?', \DB::connection('dbsetup')->getQueryGrammar()->wrapTable($data[0]), $statement);
        
        return \DB::connection('dbsetup')->statement($sql);
    }

    protected function createCustomDbConnection()
    {
        // Get the default database config
        $config = \App::make('config');
        $connections = $config->get('database.connections');
        $defaultConnection = $connections[$config->get('database.default')];

        // Clone the default database config and remove the database name field
        $newConnection = $defaultConnection;
        $newConnection['database'] = '';

        // Store this new connection under our name
        $config->set('database.connections.dbsetup', $newConnection);
        
        return $defaultConnection;
     }

}
