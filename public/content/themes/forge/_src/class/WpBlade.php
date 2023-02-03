<?php
namespace Deljdlx\WPForge;

use Illuminate\Config\Repository;
use Illuminate\Contracts\View\View;
use Illuminate\Events\Dispatcher;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Facade;
use Illuminate\View\ViewServiceProvider;

class WpBlade
{

    public $factory;


    private $compiler;

    private $container;


    public function __construct(string|array $viewPathes, string $cachePath)
    {
        $this->container = new LaravelApplication();



        $this->container->bindIf('files', function () {
            return new Filesystem;
        }, true);

        $this->container->bindIf('events', function () {
            return new Dispatcher();
        }, true);

        $this->container->bindIf('config', function () use ($viewPathes, $cachePath) {
            return new Repository([
                'view' => [
                    'paths' => (array) $viewPathes,
                    'compiled' => $cachePath,
                ]
            ]);
        }, true);

        Facade::setFacadeApplication($this->container);

        (new ViewServiceProvider($this->container))->register();

        $this->factory = $this->container->get('view');
        $this->compiler = $this->container->get('blade.compiler');
    }


    public function make($view, $data = [], $mergeData = []): View
    {
        return $this->factory->make($view, $data, $mergeData);
    }

    public function directive(string $name, $callback)
    {
        return Blade::directive($name, $callback);
    }

    public function component(string $name, string $className)
    {
        return Blade::component($name, $className);
    }

    /*
    public function __call(string $method, array $params)
    {
        return call_user_func_array([$this->factory, $method], $params);
    }
    */
}

