<?php

namespace Paw\core\database;

use PDO;
use PDOException;
use Paw\core\Config;
use Paw\core\traits\Loggable;

class ConnectionBuilder{

    use Loggable;

    public function make(Config $config):PDO{
        
        try{
            $adapter =  $config->get("DB_ADAPTER");
            $hostname = $config->get("DB_HOSTNAME");
            $dbname =   $config->get("DB_DBNAME");
            $port =     $config->get("DB_PORT");
            $charset =  $config->get("DB_CHARSET");
            
            return new PDO(
                # Connection is different because of docker presence
                # name = paw | hostname = paw_db | port = 5432 | username = admin | password = admin
                "{$adapter}:host={$hostname};dbname={$dbname};port={$port}",
                $config->get("DB_USERNAME"),
                $config->get("DB_PASSWORD"),
                [
                    'options' => [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                    ]
                ]
            );

        }catch(PDOException $e){
            echo '<pre>';
            var_dump($adapter);
            var_dump($hostname);
            var_dump($dbname);
            var_dump($port);
            var_dump($charset);
            var_dump($config->get("DB_USERNAME"));
            var_dump($config->get("DB_PASSWORD"));
            $this->logger->error('Internal Server Error', ['Error' => $e]);
            die('Error Interno - Consulte al administrador');

        }

    }
}


?>