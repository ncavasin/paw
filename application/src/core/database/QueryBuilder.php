<?php

use PDO;
use Monolog\Logger;

class QueryBuiler{

    public function __construct(PDO $pdo, Logger $logger){
        $this->$pdo = $pdo;
        $this->$logger = $logger;
    }



    public function select(){

        #TODO
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