<?php

namespace Paw\app\controllers;

use Paw\core\Controller;
use Paw\app\models\Usuario;

class UsuariosController extends Controller{


    public ?string $modelName = Usuario::class;
    
    public function index() {

    }

    public function get() {

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
            $notification_text = 'Los emails no coninciden';
        }

        if ($values['pwd'] != $_POST['conf_pwd']) {
            $isValid = false;
            $notification_text = 'Las contraseñas no coninciden';
        }

        if ($isValid) {
            $result = $this->model->set($values);
            for ($idx = 0; $isValid && $idx < count($result); $idx++) {
                $isValid = is_null($result[$idx]['error']) && $isValid;
            }
            if ($isValid) $this->model->save();
            else {
                $notification_text = 'Error';
                $log->debug('error en el modelo', [$result, $isValid]);
            }
            # si salio bien le damos save
            # si hay problemas devolvemos error
        }

        $titulo = 'Registrarse';
        $notification = true;
        $notification_type = $isValid ? SUCCESS : ERROR;
        require $this->viewsDir . 'register_view.php';


        /* $requiredValues = [
            'nombre' => ['label' => 'Nombre'],
            'apellido' => ['label' => 'Apellido'],
            'celular' => ['label' => 'Celular'],
            'email' => ['label' => 'Email', 'validate' => function ($email) {
                return $this->validateEmail($email);
            }],
            'conf_email' => ['label' => 'Email', 'validate' => function ($email) {
                return $this->validateEmail($email);
            }],
            'contrasenia' => ['label' => 'Contraseña', 'validate' => function ($pass) {
                return $this->validatePassword($pass);
            }],
            'conf_contrasenia' => ['label' => 'Contraseña', 'validate' => function ($pass) {
                return $this->validatePassword($pass);
            }],
            'fecha_nacimiento' => ['label' => 'Fecha de nacimiento', 'validate' => function ($date) {
                return $this->validateDate($date);
            }],
        ];
        # valido los campos
        list($validated, $isValid, $notification_text) = $this->validateForm($requiredValues); # validated viene sanitizado
        if (!$isValid) $this->register(true, false, $notification_text);
        # valido los campos que requieren confirmacion
        else if ($validated['email'] != $validated['conf_email']) $this->register(true, false, 'Los email no coinciden');
        else if ($validated['contrasenia'] != $validated['conf_contrasenia']) $this->register(true, false, 'Las contraseñas no coinciden');
        else $this->register(true, true, 'Registro completado con éxito'); */

    }

}

?>