<?php

require __DIR__ . '/../vendor/autoload.php';

use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;
use Paw\core\Router;

# Error handler
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

# Log handler
$log = new Logger('mvc-app');
$log->pushHandler(new StreamHandler(__DIR__ . '/../logs/app.log', Logger::DEBUG));

# Routes handler
$router = new Router;

# Supported routes
$router->get('/login', 'PageController@login');
$router->post('/login', 'PageController@loginProcess');

$router->get('/register', 'PageController@register');
$router->post('/register', 'PageController@registerProcess');

$router->get('/', 'PageController@index');
$router->get('/about', 'PageController@about');
$router->get('/services', 'PageController@services');
$router->get('/coverages', 'PageController@coverages');

$router->get('/turns', 'PageController@turns');
$router->post('/turns', 'PageController@turnsProcess');

$router->get('notFound', 'ErrorController@notFound');
$router->get('internalError', 'ErrorController@internalError');

?>