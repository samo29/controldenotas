<?php
declare(strict_types=1);

namespace Core;

/**
 * Class Bootstrap
 * @package Kernel
*/
abstract class FrontController 
{
    /**
     * @var array
     */
    protected $routes;
    
    public function __construct()
    {
        $this->initRoutes();
        $this->run($this->getUrl());
    }
    /**
     * @param array $routes
     */
    public function setRoutes(array $routes)
    {
        $this->routes = $routes;
    }
    /**
     * @param $url
     */
    protected function run($url) 
    {
        array_walk($this->routes, function($route) use($url)
        {
            if($url==$route['route']) {
                $class = "App\\Controllers\\".ucfirst($route['controller']);
                $controller = new $class;
                $action = (string) $route['action'];
                $controller->$action();
            }
        });
    }

    /**
     * @return mixed
     */
    protected function getUrl(): string
    {
        $pattern = "#([a-zA-Z0-9\/]+)(\?.*)?#";
        $x = preg_replace($pattern,"$1",$_SERVER['REQUEST_URI']);
        return $x;
    }
    /**
     * @return mixed
     */
    abstract protected function initRoutes();
}