<?php

namespace Controllers;

use Routers\Router;

class RouterController
{
    private static $_instance;
    
    public static function getInstance(): RouterController
    {
        if(self::$_instance instanceof self){
            return self::$_instance;
        }
        return self::$_instance = new self;
    }

    public function route(array $routes, array $requestParts)
    {
        $router = new Router($routes);
        $router->route($requestParts);
    }
}