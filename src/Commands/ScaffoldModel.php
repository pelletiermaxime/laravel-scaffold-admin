<?php

namespace Pelletiermaxime\LaravelScaffoldAdmin\Commands;

use Illuminate\Console\GeneratorCommand;

class ScaffoldModel extends GeneratorCommand
{
    protected $signature = '
        scaffold-admin:model
        {name : Name of the model}
    ';

    protected $description = 'Scaffold a model class.';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Model';

    private $modelName;

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $modelName = $this->parseName($this->getNameInput());

        $path = $this->getPath($modelName);

        if ($this->alreadyExists($this->getNameInput())) {
            $this->error($this->type.' already exists!');

            return false;
        }

        $this->modelName = $this->getNameInput();

        $this->makeDirectory($path);

        $this->files->put($path, $this->buildClass($modelName));

        $this->info($this->type.' created successfully.');
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return 'scaffold-admin::model';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace;
    }


    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        $view = view($this->getStub())
            ->withModel($this->modelName)
            ->render();
        return "<?php\n" . $view;
    }
}
