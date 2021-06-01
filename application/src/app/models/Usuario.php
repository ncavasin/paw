<?php

namespace Paw\app\models;

use Exception;
use Paw\core\Model;
use Paw\core\exceptions\InvalidFormatException;
use Paw\core\database\Constants;

class Usuario extends Model{
    
    # 1-1 relation against Usuarios table
    public $table = 'usuarios';

    # Table columns
    public $fields = [
        "nombre"            => ["value" => null, "error" => null],
        "apellido"          => ["value" => null, "error" => null],
        "fnac"              => ["value" => null, "error" => null],
        "celular"           => ["value" => null, "error" => null],
        "mail"              => ["value" => null, "error" => null],
        "pwd"               => ["value" => null, "error" => null], # TODO: hash password
        "id_obra_social"    => ["value" => null, "error" => null]  # Only one cobertura per user
    ];

    public function setNombre(string $nombre){
        if (strlen($nombre ) > Constants::getNomApMax()){
            $this->fields['nombre']['error'] = 'Nombre de Usuario demasiado largo. Limite: '. Constants::getNomApMax() . ' caracteres.';
        }
        $this->fields['nombre']['value'] = $nombre;
    }

    public function setApellido(string $apellido){
        if (strlen($apellido ) > Constants::getNomApMax()){

            $this->fields['apellido']['error'] = 'Apellido de Usuario demasiado largo. Limite: ' . Constants::getNomApMax() . ' caracteres.';
        }
        $this->fields['apellido']['value'] = $apellido;
    }

    private function parseDate($field)
    {
        return explode('-', $field);
    }

    private function validDate($date){
        $parsedDate = $this->parseDate($date); # llega con el formato aaaa-mm-dd
        if ((count($parsedDate) == 3) && checkdate($parsedDate[1], $parsedDate[2], $parsedDate[0])) return true;
        return false;
    }

    public function setFnac($fnac){
        if(! $this->validDate($fnac)){
            $this->fields['fnac']['error'] = 'Fecha de Nacimiento de Usuario inválida.';
        }
        # Copy paste logic from Page Controllers
        $this->fields['fnac']['value'] = $fnac;
    }

    private function validarCelular(){
        # Handle verification: regex?
        return true;
    }

    public function setCelular($celular){
        if(! $this->validarCelular($celular)){
            $this->fields['celular']['error'] = 'Celular del Usuario inválido.';
        }
        $this->fields['celular']['value'] = $celular;
    }

    public function setMail($mail){
        if (! $this->validarMail($mail)){
            $this->fields['mail']['error'] = 'Mail de Usuario con formato invalido.';
        } 
        $this->fields['mail']['value'] = $mail;
    }

    public function setPwd($pwd){
        $this->fields['pwd']['value'] = $pwd;
        # TODO hash it!!!
    }

    public function setId_obra_social($id_obra_social){
        $this->fields['id_obra_social']['value'] = $id_obra_social;
    }

    public function set(array $values){
        foreach(array_keys($this->fields) as $key){
            if((! isset($values[$key]) && $key != 'id_obra_social')){
                $this->fields[$key]['error'] = "El campo no puede estar vacío ({$key})"; # TODO si no encuentra la variable deberia tirar un error 
            }
            # Armo el nombre de la funcion a ejecutar para el setter correspondiente
            $method = 'set' . ucfirst($key);
            $this->$method($values[$key]);
        }
        return $this->fields;
    }

    private function validarMail($mail){
        if(! filter_var($mail, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        return true;
    }
 
    public function login(array $values){
        $this->fields['mail']['value'] = $values['mail'];
        $this->fields['pwd']['value'] =  $values['pwd'];
        $isValid = true;

        if(! $this->validarMail($values['mail'])){
            $this->fields['mail']['error'] = 'Mail inválido.';
            $isValid = false;
        }
        
        if(! isset($values['pwd'])){
            $this->fields['pwd']['error'] = 'Completar contraseña.';
            $isValid = false;
        }

        if(! $isValid){
            return $isValid;
        }

        $result = $this->queryBuilder->selectUsuario($this->table, $values);

        if(! count($result)) return false;
        $result['pwd'] = null;
        return [$isValid, $result];
    }

    public function save () {
        try{
            $params = [];
            foreach( $this->fields as $key => $field) $params[$key] = $field['value'];
            $this->queryBuilder->insert($this->table, $params);
        } catch(Exception $e){
            var_dump($e);die;
        }
    }


}

?>