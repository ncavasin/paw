<?php

namespace Paw\app\controllers;

use GrahamCampbell\ResultType\Result;
use Paw\core\Controller;
use Paw\app\models\Usuario;

class UsuariosController extends Controller{
    public ?string $modelName = Usuario::class;
    
    public function index() {

    }

    public function loginProcess() {
        global $log;    
        $isValid = true;
        $notification_text = 'Sesion iniciada con éxito';
        $values = [
            'mail' => $_POST['mail'],
            'pwd' => $_POST['pwd']
        ];
        list($isValid, $result) = $this->model->login($values);
        if(! $isValid){
            $notification_text = 'El usuario no existe. Por favor regístrese.';
        }
        $titulo = 'Iniciar sesión';
        $notification = true;
        $notification_type = $isValid ? SUCCESS : ERROR;
        require $this->viewsDir . 'login_view.php';
        
    }

    public function register() {
        global $log;
        # array para saber si vienen los campos requeridos y validarlos segun sus requisitos
        # crear obj usuario -> no creo objeto nuevo porque ya lo hace el constructor en $this->model
        $isValid = true;
        $notification_text = 'Usuario registrado con éxito';
        # setear los campos  -> devuelve bool
        $values = [
            "nombre" => $_POST['nombre'],
            "apellido" => $_POST['apellido'],
            "fnac" => $_POST['fnac'],
            "celular" => $_POST['celular'],
            "mail" => $_POST['mail'],
            "pwd" => $_POST['pwd'],
            "id_obra_social" => null, // TODO
        ];

        if (strtolower($values['mail']) != strtolower($_POST['conf_mail'])) {
            $isValid = false;
            $notification_text = 'Los emails no coinciden';
        }

        if ($values['pwd'] != $_POST['conf_pwd']) {
            $isValid = false;
            $notification_text = 'Las contraseñas no coinciden';
        }

        if ($isValid) {
            $result = $this->model->set($values);
            foreach($result as $item) {
                $isValid = is_null($item['error']) && $isValid;
            }
            if ($isValid) $this->model->save();
            else {
                $notification_text = 'Error al ingresar datos desde el formulario, revise los logs para mas información';
                $log->debug('Error en el modelo', [$result, $isValid]);
            }
            # si salio bien le damos save
            # si hay problemas devolvemos error
        }

        $titulo = 'Registrarse';
        $notification = true;
        $notification_type = $isValid ? SUCCESS : ERROR;
        require $this->viewsDir . 'register_view.php';
    }

}

?>