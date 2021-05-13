<?php

namespace Paw\core;

use Paw\core\exceptions\RouteNotFoundException;

class Router{

    public array $routes = [
        "GET" => [],
        "POST" => []
    ];

    # Add an action method for the <route's_path+http_method> received pair
    private function loadRoute($path, $action, $http_method = "GET"){
        $this->routes[$http_method][$path] = $action;
    }


    # Load a route with http_method as GET
    public function get($path, $action){
        $this->loadRoute($path, $action, "GET");
    }

    # Load a route with http_method as POST
    public function post($path, $action){
        $this->loadRoute($path, $action, "POST");
    }

    # Path existance for the http method received
    public function exists($path, $http_method){
        return array_key_exists($path, $this->routes[$http_method]);
    }


    # Return proper controller for http method received
    public function getController($path, $http_method){
        return explode('@', $this->routes[$http_method][$path]);
    }     


    # Trigger action method based upon the http method received
    public function direct($path, $http_method = "GET"){

        if (!$this->exists($path, $http_method)){
            throw new RouteNotFoundException('No existe una ruta para este path');
        }

        # Parse request
        list($controller, $action)  = $this->getController($path, $http_method);
        $controller_name = "Paw\\app\controllers\\{$controller}";
        
        # Serve it properly
        $objControler = new $controller_name;
        $objControler->$action();
    }
 
}

?>