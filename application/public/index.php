<?php

require __DIR__ . '/../src/bootstrap.php';


use Paw\app\controllers\ErrorController;
use Paw\app\controllers\PageController; 

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// throw new \Exception('Error message for the dev');

$nombre = htmlspecialchars($_GET['nombre'] ?? 'PAW');
$main = 'vacio';

# Path router
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$controller = new PageController();

$log->info("Peticion a {$path}");

if ($path == '/'){
    $controller->index();
    $log->info('Respuesta exitosa: 200');
}else if ($path == '/about'){

    $controller->about();
    $log->info('Respuesta exitosa: 200');
}else if($path == '/services'){

    $controller->services();
    $log->info('Respuesta exitosa: 200');

}else if($path == '/coverages'){
    
    $controller->coverages();
    $log->info('Respuesta exitosa: 200');

}else if($path == '/turns'){

    $controller->turns();
    $log->info('Respuesta exitosa: 200');

}else if($path == '/login'){
    $controller->login();
    $log->info('Respuesta exitosa: 200');
}else if($path == '/register'){
    $controller->register();
    $log->info('Respuesta exitosa: 200');
}else {
    $controller = new ErrorController;
    $controller->notFound();
    $log->info('Path not found: 404');
}

