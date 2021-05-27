<?php

namespace Paw\app\models;

use Paw\core\Model;
use Paw\core\exceptions\InvalidFormatException;

class Usuario extends Model{
    
    # 1-1 relation against Usuarios table
    public $table = 'usuarios';

    # Table columns
    public $fields = [
        "nombre"        => null,
        "apellido"      => null,
        "fnac"          => null,
        "celular"       => null,
        "mail"          => null,
        "contrasenia"   => null, # TODO: hash password
        "cobertura"     => null  # Only one cobertura per user
    ];

    public function setNombre(string $nombre){
        if (strlen($nombre ) > constant('_NOM_AP_MAX')){

            throw new InvalidFormatException('Nombre de Usuario demasiado largo. Limite: '. constant('_NOMAP_MAX') . ' caracteres.');
        }
        $this->fields['nombre'] = $nombre;
    }

    public function setApellido(string $apellido){
        if (strlen($apellido ) > constant('NOM_AP_MAX')){

            throw new InvalidFormatException('Apellido de Usuario demasiado largo. Limite: ' . constant('_NOMAP_MAX') . ' caracteres.');
        }
        $this->fields['apellido'] = $apellido;
    }


    private function validDate(){
        # Handle verification
    }

    public function setFnac($fnac){

        if(! $this->validDate($fnac)){
            throw new InvalidFormatException('Fecha de Nacimito de Usuario inválida.');
        }

        # Copy paste logic from Page Controllers
        
        $this->fiels['fnac'] = $fnac;
    }

    private function validPhone(){
        # Handle verification: regex?
    }

    public function setCelular(string $celular){

        if(! $this->validPhone($celular)){
            throw new InvalidFormatException('Celular del Usuario inválido.');
        }

        $this->fields['celular'] = $celular;
    }

    public function setMail(string $mail){

        if (! filter_var($mail, FILTER_VALIDATE_EMAIL)){

            throw new InvalidFormatException('Mail de Usuario con formato invalido.');
        }
        
        $this->fields['mail'] = $mail;
    }

    public function setContrasenia(){
        
        # Hash it!!!
    }
    

    public function setCobertura{
        
        
        # Handle new cobertura


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