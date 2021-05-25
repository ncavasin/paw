<?php

require __DIR__ . '/../vendor/autoload.php';

use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;
use Dotenv\Dotenv;

use Paw\core\Router;
use Paw\core\Config;

# Constants
const SUCCESS = 'success';
const ERROR = 'error';
const WARN = 'warn';

# Error handler
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

# Log handler
$dotenv = Dotenv::createUnsafeImmutable(__DIR__ . '/../');
# Load enviroment vars
$dotenv->load();

$config = new Config();

# Use them to initialize the logger
$log = new Logger('mvc-app');
$handler = new StreamHandler($config->get('LOG_PATH'));
$handler->setLevel($config->get('LOG_LEVEL'));
$log->pushHandler($handler);


# Routes handler
$router = new Router;

# Supported routes
$router->get('/', 'PageController@index');
$router->get('/about', 'PageController@about');
$router->get('/services', 'PageController@services');

$router->get('/login', 'PageController@login');
$router->post('/login', 'PageController@loginProcess');

$router->get('/reset_password', 'PageController@resetPassword');
$router->post('/reset_password', 'PageController@resetPasswordProcess');

$router->get('/register', 'PageController@register');
$router->post('/register', 'PageController@registerProcess');

$router->get('/coverages', 'PageController@coverages');
$router->post('/coverages', 'PageController@coveragesProcess');

$router->get('/turns', 'PageController@turns');
$router->post('/turns', 'PageController@turnsProcess');

$router->get('notFound', 'ErrorController@notFound');
$router->get('internalError', 'ErrorController@internalError');

?>