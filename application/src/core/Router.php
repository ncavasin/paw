<?php

namespace Paw\core;

use Paw\core\exceptions\RouteNotFoundException;

class Router{


    # List of accepted routes
    public array $routes;

    public function loadRoute($path, $action){

        # key-value pair: <route, method to process request>
        $this->routes[$path] = $action;
    }


    public function direct($path){

        if (! array_key_exists($path, $this->routes)){
            throw new RouteNotFoundException('No existe una ruta para este path');
        }

        list($controller, $method)  = explode('@', $this->routes[$path]);
        $controller_name = "Paw\\app\controllers\\{$controller}";
        $objControler = new $controller_name;
        $objControler->$method();
        
    }
 
}

?>