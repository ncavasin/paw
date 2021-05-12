<?php

require __DIR__ . '/../vendor/autoload.php';

use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;


$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$log = new Logger('mvc-app');
$log->pushHandler(new StreamHandler(__DIR__ . '/../logs/app.log', Logger::DEBUG));

?>