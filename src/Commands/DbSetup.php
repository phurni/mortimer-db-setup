<?php namespace Mortimer\DbSetup\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

class DbSetup extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'db:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the command batch: db:create, migrate and db:seed';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $this->call('db:create', ['--force' => true]);
        $this->call('migrate');
        $this->call('db:seed');
    }

}
