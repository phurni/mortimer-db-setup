<?php namespace Mortimer\DbSetup;

use Illuminate\Support\ServiceProvider;

class DbSetupServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['db.create'] = $this->app->share(function () {
            return new Commands\DbCreate();
        });
        $this->commands('db.create');

        $this->app['db.drop'] = $this->app->share(function () {
            return new Commands\DbDrop();
        });
        $this->commands('db.drop');

        $this->app['db.setup'] = $this->app->share(function () {
            return new Commands\DbSetup();
        });
        $this->commands('db.setup');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

}
