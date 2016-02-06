<?php

namespace Pelletiermaxime\LaravelScaffoldAdmin\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class ScaffoldView extends Command
{
    protected $signature = '
        scaffold-admin:view
        {name : Name of the view}
    ';

    protected $description = 'Scaffold the views for a model';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'View';

    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $views = $this->getStub();
        foreach ($views as $localPath) {
            if ($this->files->isDirectory($localPath)) {
                $dir_itr = new \RecursiveDirectoryIterator($localPath);
                $itr = new \RecursiveIteratorIterator($dir_itr, \RecursiveIteratorIterator::SELF_FIRST);
                foreach ($itr as $file) {
                    if ($file->isFile()) {
                        $this->generateView($file);
                    }
                }
            } else {
                $this->generateView($localPath);
            }
        }
    }

    private function generateView($localPath)
    {
        $publishedViewsBasePath = base_path('resources/views/admin');
        $localViewsPath = __DIR__.'/../stubs/views';

        $generatedFilePath = str_replace($localViewsPath, '', $localPath);
        $generatedPath = $publishedViewsBasePath . $generatedFilePath;

        if ($this->files->exists($generatedPath)) {
            $this->warn("$generatedPath already exists");
            return;
        }

        $this->makeDirectory($generatedPath);

        $this->files->put($generatedPath, $this->buildClass($localPath));

        $this->info("$generatedPath created successfully.");
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        $localViewsPath = __DIR__.'/../stubs/views';
        return [
            "$localViewsPath/auth",
            "$localViewsPath/errors",
            "$localViewsPath/layouts",
            "$localViewsPath/home.blade.php",
            "$localViewsPath/welcome.blade.php",
        ];
    }

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($localPath)
    {
        return $this->files->get($localPath);
    }
}
