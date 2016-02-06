<?php

namespace Pelletiermaxime\LaravelScaffoldAdmin\Commands;

use Illuminate\Contracts\Foundation\Application as LaravelApplication;

class ScaffoldController extends ScaffoldBase
{

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Controller';

    private $className;
    private $modelName;
    private $controllerName;
    private $fullControllerName;
    private $pathController;
    private $generateRoute;

    public function nameController($controllerName)
    {
        $this->controllerName = $controllerName;
        return $this;
    }

    public function nameFullControllerName($fullControllerName)
    {
        $this->fullControllerName = $fullControllerName;
        return $this;
    }

    public function nameModel($nameModel)
    {
        $this->modelName = $nameModel;
        return $this;
    }

    public function nameRoute($nameRoute)
    {
        $this->routeName = $nameRoute;
        return $this;
    }

    public function nameView($nameView)
    {
        $this->viewName = $nameView;
        return $this;
    }

    public function pathRoute($pathRoute)
    {
        $this->pathRoute = $pathRoute;
        return $this;
    }

    public function pathController($pathController)
    {
        $this->pathController = $pathController;
        return $this;
    }

    public function route($route)
    {
        $this->generateRoute = $route;
        return $this;
    }

    public function generate()
    {
        $fullControllerName = $this->fullControllerName;

        $this->className = str_replace($this->getNamespace($fullControllerName).'\\', '', $fullControllerName);

        $this->makeDirectory($this->pathController);

        $this->files->put($this->pathController, $this->buildClass($fullControllerName));

        if ($this->generateRoute) {
            $this->appendRoute();
        }
    }

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    private function buildClass($name)
    {
        $class = $this->className;
        $view = view('scaffold-admin::controller')
            ->withClass($class)
            ->withModel($this->modelName)
            ->withView($this->viewName)
            ->withNamespace($this->getNamespace($name))
            ->render();
        return "<?php\n" . $view;
    }

    private function appendRoute()
    {
        $routeFile = $this->pathRoute;

        if (file_exists($routeFile)) {
            $route = "\nRoute::resource('" . $this->routeName . "', 'Admin\\{$this->className}');";
            return $this->files->append($routeFile, $route);
        }
    }
}
