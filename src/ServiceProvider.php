<?php namespace Pelletiermaxime\LaravelScaffoldAdmin;

use Illuminate\Support\ServiceProvider;

class ServiceProvider extends ServiceProvider
{
    /**
     * This will be used to register config & view in
     * your package namespace.
     *
     * --> Replace with your package name <--
     */
    protected $packageName = 'laravel-scaffold-admin';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/routes.php';
        }

        // // Register Views from your package
        // $this->loadViewsFrom(__DIR__.'/../views', $this->packageName);

        $this->loadViewsFrom(__DIR__ . '/stubs', 'scaffold-admin');

        // // Register your asset's publisher
        // $this->publishes([
        //     __DIR__.'/../assets' => public_path('vendor/'.$this->packageName),
        // ], 'public');

        // // Register your migration's publisher
        // $this->publishes([
        //     __DIR__.'/../database/migrations/' => base_path('/database/migrations')
        // ], 'migrations');

        // // Publish your seed's publisher
        // $this->publishes([
        //     __DIR__.'/../database/seeds/' => base_path('/database/seeds')
        // ], 'seeds');

        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->publishes([
        //     __DIR__.'/../config/config.php' => config_path($this->packageName.'.php'),
        // ]);

        $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');

        $this->commands(
            'Pelletiermaxime\LaravelScaffoldAdmin\Commands\ScaffoldController',
            'Pelletiermaxime\LaravelScaffoldAdmin\Commands\ScaffoldMigration'
        );
    }
}
