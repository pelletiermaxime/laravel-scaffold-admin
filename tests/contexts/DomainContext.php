<?php

use Behat\Behat\Tester\Exception\PendingException;
use Illuminate\Console\Application;
use Illuminate\Filesystem\Filesystem;
use Pelletiermaxime\LaravelScaffoldAdmin\Commands\ScaffoldController;
use Philo\Blade\Blade;
use Symfony\Component\Console\Tester\CommandTester;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\visitor\vfsStreamStructureVisitor;

/**
 * Behat context class.
 */
class DomainContext extends BaseDomainContext
{
    /**
     * @var  vfsStreamDirectory
     */
    private $root;

    public function __construct()
    {
        $structure = [
            'app' => [
                'Http' => [
                    'Controllers' => [],
                    'routes.php' => '',
                ],
            ],
        ];
        $this->root = vfsStream::setup('root', null, $structure);
    }

    /**
     * @When I create the controller :arg1
     */
    public function iCreateTheController($controllerName)
    {
        $filesystem = new Filesystem();
        $views = __DIR__ . '/views';
        $cache = __DIR__ . '/cache';

        $blade = new Blade($views, $cache);
        // $view = new View();
        $scaffoldController = new ScaffoldController($filesystem, $blade->view());

        $rootDirectory = vfsStream::url('root');
        $scaffoldController
            ->pathRoute("$rootDirectory/app/Http/routes.php")
            ->pathController("$rootDirectory/app/Http/Controllers/Admin/{$controllerName}Controller.php")
            ->nameController($controllerName)
            ->nameFullControllerName('App\Http\Controllers\Admin\PatateController')
            ->nameModel($controllerName)
            ->nameRoute(strtolower($controllerName))
            ->nameView(strtolower($controllerName))
            ->route(true)
            ->generate()
        ;

        var_dump(vfsStream::inspect(new vfsStreamStructureVisitor())->getStructure());
    }

    /**
     * @Then the file :arg1 should exists
     */
    public function theFileShouldExists($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then it should have the class :arg1
     */
    public function itShouldHaveTheClass($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then it should be in the namespace :arg1
     */
    public function itShouldBeInTheNamespace($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then the routes file should contain a route :arg1 linked to :arg2
     */
    public function theRoutesFileShouldContainARouteLinkedTo($arg1, $arg2)
    {
        throw new PendingException();
    }
}
