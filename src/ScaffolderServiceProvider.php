<?php namespace Pelletiermaxime\LaravelScaffoldAdmin;

use Illuminate\Support\ServiceProvider;

class ScaffolderServiceProvider extends ServiceProvider
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
        // $this->loadViewsFrom(__DIR__.'/../resources/views', $this->packageName);

        $this->loadViewsFrom(__DIR__ . '/stubs', 'scaffold-admin');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes($this->assetsPath(), $this->packageName);

        $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');

        $this->commands(
            'Pelletiermaxime\LaravelScaffoldAdmin\Commands\ScaffoldControllerCommand',
            'Pelletiermaxime\LaravelScaffoldAdmin\Commands\ScaffoldMigration',
            'Pelletiermaxime\LaravelScaffoldAdmin\Commands\ScaffoldModel',
            'Pelletiermaxime\LaravelScaffoldAdmin\Commands\ScaffoldView',
            'Pelletiermaxime\LaravelScaffoldAdmin\Commands\ScaffoldGenerateCommand'
        );
    }

    private function assetsPath()
    {
        $localAssetsPath = __DIR__.'/../public';
        $adminAssetsPath = public_path('admin');
        return [
            "$localAssetsPath/css"     => "$adminAssetsPath/css",
            "$localAssetsPath/js"      => "$adminAssetsPath/js",
            "$localAssetsPath/fonts"   => "$adminAssetsPath/fonts",
        ];
    }
}
