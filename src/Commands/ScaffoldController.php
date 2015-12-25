<?php

namespace Pelletiermaxime\LaravelScaffoldAdmin\Commands;

use Illuminate\Console\GeneratorCommand;

class ScaffoldController extends GeneratorCommand
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

    private $className;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->parseName($this->getNameInput() . 'Controller');

        $path = $this->getPath($name);

        if ($this->alreadyExists($this->getNameInput())) {
            $this->error($this->type.' already exists!');

            return false;
        }

        $this->className = str_replace($this->getNamespace($name).'\\', '', $name);

        $this->makeDirectory($path);

        $this->files->put($path, $this->buildClass($name));

        $this->appendRoute($this->getNameInput());

        $this->info($this->type.' created successfully.');
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/../stubs/controller.blade.php';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\Controllers\Admin';
    }


    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        $class = $this->className;
        $view = view('scaffold-admin::controller', compact('class'))->render();
        return "<?php\n" . $view;
    }

    private function appendRoute($nameInput)
    {
        $appendRoute = ($this->option('no-route') !== true);
        $routeFile = app_path('Http/routes.php');

        if ($appendRoute && file_exists($routeFile)) {
            $route = "\nRoute::resource('" . strtolower($nameInput) . "', '{$this->className}');";
            if ($this->files->append($routeFile, $route) !== false) {
                $this->info('Resource route added to ' . $routeFile);
            } else {
                $this->info('Unable to add the route to ' . $routeFile);
            }
        }
    }
}
