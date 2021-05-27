<?php

namespace Paw\app\models;

use Paw\core\exceptions\InvalidFormatException;
use Paw\core\Model;

class Coberturas extends Model{

    # 1-1 relation against Servicios table
    public $table;

    # Table columns
    public array $fields = [
        'nombre'    => null
    ];

    public function setNombre(string $nombre){

        if(strlen($nombre) > constant('_SERVICES_MAX')){
            throw new InvalidFormatException('Nombre de Servicio demasiado largo. Limite ' . constant('_SERVICES_MAX') . ' caracteres.');
        }

        $this->field['nombre'] = $nombre;
    }

    public function set(array $values){
        
        foreach(array_keys($this->fields) as $key){

            if(! isset($values[$key])){
                continue;
            }

            $method = 'set' . ucfirst($key);
            $this->method($values[$key]);
        }

    }
}

?>