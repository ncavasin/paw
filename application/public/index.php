<?php

require __DIR__ . '/../src/bootstrap.php';

use Paw\core\exceptions\RouteNotFoundException;
use Paw\core\Router;

$nombre = htmlspecialchars($_GET['nombre'] ?? 'PAW');
$main = 'vacio';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$log->info("Peticion a {$path}");


$router = new Router;

$router->loadRoute('/', 'PageController@index');
$router->loadRoute('/about', 'PageController@about');
$router->loadRoute('/services', 'PageController@services');
$router->loadRoute('/coverages', 'PageController@coverages');
$router->loadRoute('/turns', 'PageController@turns');
$router->loadRoute('/login', 'PageController@login');
$router->loadRoute('/register', 'PageController@register');
$router->loadRoute('notFound', 'ErrorController@notFound');
$router->loadRoute('internalError', 'ErrorController@internalError');

try{

    $router->direct($path);

}catch (RouteNotFoundException $e){

    $router->direct('notFound');
    $log->info('Status code 404 - Path not found', ["Error" => $path]);

} catch(Exception $e){

    $router->direct('internalError');
    $log->error('Status code 500 - Internal server error', ["Error" => $e]);
}
