<?php

namespace Paw\core\database;

use PDO;
use Monolog\Logger;

class QueryBuiler{

    public function __construct(PDO $pdo, Logger $logger){
        $this->$pdo = $pdo;
        $this->$logger = $logger;
    }



    public function select($table, $params = [], $join = []){
        $where = '1 = 1';
        if (isset($params['id'])) $where = "id = :id";
        $query = "select * from {$table} where {$where}";
        $sentencia = $this->pdo->prepare($query);
        if (isset($params['id'])) $sentencia->bindValue(":id", $params['id']);
        $sentencia = $this->pdo->setFetchMode(PDO::FETCH_ASSOC)->execute();
        #var_dump($sentencia->fetchAll());die;
        return $sentencia->fetchAll();
    }


    public function insert(){


    }


    public function update(){

        #TODO
    }

    public function delete(){

        # TODO
    }


}


?>