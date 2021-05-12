<?php

require __DIR__ . '/../vendor/autoload.php';

use Paw\app\controllers\ErrorController;
use \Paw\app\controllers\PageController;

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();



// throw new \Exception('Error message for the dev');




$nombre = htmlspecialchars($_GET['nombre'] ?? 'PAW');
$main = 'vacio';

# Path router
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$controller = new PageController();

if ($path == '/'){
    $controller->index();

}else if ($path == '/about'){

    $controller->about();

}else if($path == '/services'){

    $controller->services();

}else if($path == '/coverages'){
    
    $controller->coverages();

}else if($path == '/turns'){
    
    $controller->turns();

}else{
    $controller = new ErrorController;
    $controller->notFound();
}



# front controller
