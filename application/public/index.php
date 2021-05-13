<?php

require __DIR__ . '/../src/bootstrap.php';

use Paw\core\exceptions\RouteNotFoundException;

# Get requested path
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$http_method = $_SERVER['REQUEST_METHOD'];

# Log it
$log->info("Peticion {$http_method} a {$path}");

# Deal with it
try{
 
    $router->direct($path, $http_method);
    $log->info("Status code 200 - {$path}");
}catch (RouteNotFoundException $e){

    $router->direct('notFound');
    $log->info("Status code 404 - Path not found", ["Error" => $path]);

} catch(Exception $e){

    $router->direct('internalError');
    $log->error("Status code 500 - Internal server error", ["Error" => $e]);
}
