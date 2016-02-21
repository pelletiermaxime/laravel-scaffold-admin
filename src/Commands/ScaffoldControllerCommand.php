<?php

namespace Pelletiermaxime\LaravelScaffoldAdmin\Commands;

class ScaffoldControllerCommand extends ScaffoldCommandBase
{
    protected $signature = '
        scaffold-admin:controller
        {name : Name of the associated model}
        {--controller-name=$modelController : Controller name. Defaults to name of the model followed by Controller}
        {--no-route : Disable the default route appended to your routes.php file.}
    ';

    protected $description = 'Scaffold an admin controller for a model';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Controller';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(ScaffoldController $scaffoldController)
    {
        $generateRoute = $this->option('no-route') !== true;
        $pathRoute = app_path('Http/routes.php');

        $scaffoldController
            ->pathRoute($pathRoute)
            ->pathController($this->getPath($this->getFullControllerName()))
            ->nameController($this->getControllerName())
            ->nameFullControllerName($this->getFullControllerName())
            ->nameModel($this->getNameInput())
            ->nameRoute(strtolower($this->getNameInput()))
            ->nameView(strtolower($this->getNameInput()))
            ->route($generateRoute)
            ->generate()
        ;

        if ($generateRoute) {
            $this->info('Resource route added to ' . $pathRoute);
        }

        $this->info($this->type.' created successfully.');
    }

    private function getControllerName()
    {
        if ($this->option('controller-name') !== '$modelController') {
            return $this->option('controller-name');
        } else {
            return $this->getNameInput() . 'Controller';
        }
    }

    private function getFullControllerName()
    {
        return $this->parseName($this->getControllerName());
    }

    private function getNameInput()
    {
        return $this->argument('name');
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    public function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\Controllers\Admin';
    }
}
