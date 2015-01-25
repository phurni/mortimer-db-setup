<?php namespace Mortimer\DbSetup\Commands;

use Symfony\Component\Console\Input\InputOption;

class DbDrop extends DbBase {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'db:drop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop the database for the current environment';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        // Create database connection without database name
        $config = $this->createCustomDbConnection();
        
        // Run the query
        $this->doStatement('DROP DATABASE IF EXISTS ?', [$config['database']]);
    }

}
