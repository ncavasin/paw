<?php

namespace Paw\app\models;

use Paw\core\exceptions\InvalidFormatException;
use Paw\core\Model;

class Especialidad extends Model{

    # 1-1 relation against Especialista table
    public $table;

    # Table columns
    public $fields = [
        'nombre'    => null,
        'descripcion'  => null
    ];

    public function setNombre(string $nombre){

        if(strlen($nombre) > constant('_ESP_NOM_MAX')){
            throw new InvalidFormatException('Nombre de Especialidad  demasiado largo. Limite ' . constant('_ESPNOM_MAX') . ' caracteres.');
        }

        $this->field['nombre'] = $nombre;
    }

    public function setDescripcion($descripcion){
        if(strlen($descripcion) > constant('_ESP_DESC_MAX')){
            throw new InvalidFormatException('Descripcion de la Especialidad demasiado largo. Limite ' . constant('_ESPDESC_MAX') . ' caracteres.');
        }

        $this->field['descripcion'] = $descripcion;
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