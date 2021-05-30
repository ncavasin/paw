<?php

namespace Paw\core\database;

use Exception;
use PDO;
use Monolog\Logger;
use Paw\core\core\exceptions\QBMissingValues;
use Paw\core\core\exceptions\QBInvalidTable;

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

    # Params: <colname, value_to_insert>
    # Se asume que el controlador envia valores validos y/o no nulos
    public function insert($table, $params = []){
        
        if(! isset($params)){
            throw new QBMissingValues('No se recibieron los valores necesarios para insertar.');
        }else{

            $query = "insert into {$table} values (";

            if($table == 'usuarios'){
                $query = $query . ':nombre, :apellido, :fnac, :celular, :mail, :pwd, :id_obra_social)';
            }
            else if($table == 'turnos'){
                $query = $query . ':id_fecha, :id_hora, :id_intermedia, :path_orden, :nombre_orden)';
                    
            }else if($table == 'fecha'){
                # Como manejamos esto?
                $query = $query . ':fecha, :hora)';
                
            }else{
                $this->logger->debug('ERROR insertando en tabla ' . $table . '. No existe.');
                throw new QBInvalidTable('No existe la tabla recibida');
            }
    
            try{
                
                $statement = $this->pdo->preparare($query);
                $statement->execute($params);
                $this->logger->info('Insercion en ' . $table . '. Sentencia: ' . $statement . '.');

            }catch (Exception $e){
                $this->logger->debug('ERROR insertando en tabla ['. $table . ']. Sentencia: [' . $statement . ']. Parametros: [' . $params . '].');
                echo '<pre>';
                var_dump($statement);
                die;
            }
        }
    }

    public function update(){

        #TODO
    }

    public function delete(){

        # TODO
    }


}


?>