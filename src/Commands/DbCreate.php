<?php namespace Mortimer\DbSetup\Commands;

use Symfony\Component\Console\Input\InputOption;

class DbCreate extends DbBase {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'db:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the database for the current environment. Does nothing if the database already exists.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        // Create database connection without database name
        $config = $this->createCustomDbConnection();
        
        // Prepare charset and collation if provided
        $createOptions = '';
        if ($charset = array_get($config, 'charset')) {
            $createOptions .= "CHARACTER SET $charset ";
        }
        if ($collation = array_get($config, 'collation')) {
            $createOptions .= "COLLATE $collation ";
        }
        
        // Run the queries
        if ($this->option('force')) {
            $this->doStatement('DROP DATABASE IF EXISTS ?', [$config['database']]);
            $this->doStatement("CREATE DATABASE ? $createOptions", [$config['database']]);
        }
        else {
            $this->doStatement("CREATE DATABASE IF NOT EXISTS ? $createOptions", [$config['database']]);
        }
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['force', null, InputOption::VALUE_NONE, 'Will drop the existing database before re-creating it'],
        ];
    }
    
}
