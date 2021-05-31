<?php

namespace Paw\core\database;

use Exception;
use PDO;
use Monolog\Logger;
use Paw\core\core\exceptions\QBMissingValues;
use Paw\core\core\exceptions\QBInvalidTable;
use PDOException;

class QueryBuilder {
    public function __construct(PDO $pdo, Logger $logger){
        $this->pdo = $pdo;
        #var_dump($pdo);die;
        $this->logger = $logger;
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

    private function dispatcher($table){
        if($table == 'usuarios'){
            # IMPORTANTE sin la especificacion de las columnas antes, no anda (porque sino espera que le pases el id tambien y es autoincremental)
            return '(nombre, apellido, fnac, celular, mail, pwd, id_obra_social) VALUES (:nombre, :apellido, :fnac, :celular, :mail, :pwd, :id_obra_social)';
        }
        else if($table == 'turnos'){
            return '(id_fecha, id_hora, id_especialista, id_especialidad, id_usuario, orden_medica, nombre_orden_medica) 
                VALUES (:id_fecha, :id_hora, :id_especialista, :id_especialidad, :id_usuario, :orden_medica, :nombre_orden_medica)';
                
        }else if($table == 'fecha'){
            return '(fecha) VALUES (:fecha)';
        } else if ($table == 'hora'){
            return '(id_fecha, hora) VALUES (:id_fecha, :hora)';
        }
        return null;
    }

    # Params: <colname, value_to_insert>
    # Se asume que el controlador envia valores validos y/o no nulos
    public function insert($table, $params = []){
        
        if(! isset($params)){
            $this->logger->error('Error insertando. No se recibieron valores.');
            throw new QBMissingValues('No se recibieron los valores necesarios para insertar.');
        }else{

            $query = "insert into {$table} ";
            $values = $this->dispatcher($table);
            
            if(! $values){
                $this->logger->debug('ERROR insertando en tabla ' . $table . '. No existe.');
                throw new QBInvalidTable('No existe la tabla ' . $table);
            }

            $query = $query . $values;
            
            try{
                $statement = $this->pdo->prepare($query);
                $statement->execute($params);
                $this->logger->info('Insercion en ' . $table . '. Sentencia: ' . $query . '. Parametros: ', [$params]);

            }catch(PDOException  $e){
                $this->logger->debug('ERROR insertando en tabla ['. $table . ']. Sentencia: [' . $query . ']. Parametros: [' . $params . '].');
                $this->logger->error('stacktrace', [$e]);
                echo '<pre>';
                var_dump('ERROR:',$statement);
                die;
            }
        }
    }

    public function update(){

        #TODO
    }

    public function delete($table, $params){

        #$query = "delete from {$table} values {$where}";
        #$values = $this->dispatcher($table);
        #$count = $this->execute($query);
    }


}


?>