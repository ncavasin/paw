<?php

namespace Paw\app\models;

use Paw\core\Model;
use Paw\core\exceptions\InvalidFormatException;

class Especialista extends Model{

    # 1-1 relation against Especialista table
    public $table;

    # Table columns
    public $fields = [
        'nombre'    => null,
        'apellido'  => null
    ];

    public function setNombre(string $nombre){
        
        if (strlen($nombre ) > constant('_NOMAP_MAX')){

            throw new InvalidFormatException('Nombre de Usuario demasiado largo. Limite: ' . constant('_NOMAP_MAX') . ' caracteres.');
        }

        $this->fields['nombre'] = $nombre;
    }

    public function setApellido(string $apellido){

        if (strlen($apellido ) > constant('_NOMAP_MAX')){

            throw new InvalidFormatException('Apellido de Usuario demasiado largo. Limite: ' . constant('_NOMAP_MAX') . ' caracteres.');
        }
        
        $this->fields['apellido'] = $apellido;
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