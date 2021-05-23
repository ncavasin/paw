<?php

namespace Paw\app\controllers;

class PageController{

    public string $viewsDir;
    private array $contact;
    public array $userOptions;
    public array $menuOptions;
    public array $footerLinks;

    public function __construct(){
        $this->viewsDir = __DIR__ . "/../views/";

        $this->contact = [
            'href' => 'tel:+549234642-4593',
            'name' => '+54 9 2346 42-4593'
        ];

        $this->userOptions = [
            [
                'href' => '/login',
                'name' => 'Ingresar'
            ],
            [
                'href' => '/register',
                'name' => 'Registrarse'
            ]
        ];

        $this->menuOptions = [
            [
                'href' => '/about',
                'name' => '¿Quienes Somos?'
            ],
            [
                'href' => '/services',
                'name' => 'Nuestros Servicios'
            ],
            [
                'href' => '/coverages',
                'name' => 'Coberturas'
            ],
            [
                'href' => '/turns',
                'name' => 'Turnos'
            ]
        ];


        $this->footerLinks = [
            [
                'href' => 'https://www.facebook.com/dentalmedicalgroup',
                'name' => 'facebook'
            ],
            [
                'href' => 'https://www.instagram.com/dentalmedicalgroup',
                'name' => 'instagram'
            ],
            [
                'href' => 'https://www.linkedin.com/dentalmedicalgroup',
                'name' => 'linkedin'
            ],
            [
                'href' => 'mailto:contacto@dentalmedicalgroup.com',
                'name' => 'mail'
            ]
        ];
    }

    public function index(){
        $titulo = 'Dental Medical Group';
        require $this->viewsDir . 'index_view.php';
    }

    public function login($notification = false, $isValid = false){
        $titulo = 'Iniciar Sesión';
        $notification_type = $isValid ? SUCCESS : ERROR;
        $notification_text = $isValid ? 'Sesión iniciada con éxito' : 'Usuario o contraseña incorrecto';
        require $this->viewsDir . 'login_view.php';
    }

    public function loginProcess(){
        $email = $_POST['email'];
        $contrasenia = $_POST['contrasenia'];

        #$re = '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailNotValid = true;
        }

        if (!$email || $emailNotValid || !$contrasenia) $this->login(false, false);
        else {
            # simulacion de consulta a la base de datos sobre si el usuario y contraseña esta bien
            if ($email == 'admin@admin.com' && $contrasenia == 'admin') $this->login(true, true);
            else $this->login(true, false);
        }
    }

    public function register($notification = false, $isValid = false){
        $titulo = 'Registrarse';
        $notification_type = $isValid? SUCCESS : ERROR;
        $notification_text = $isValid? 'Registro completado con éxito' : 'Uno o mas campos no son validos';
        require $this->viewsDir . 'register_view.php';
    }

    public function registerProcess(){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $celular = $_POST['celular'];
        $email = $_POST['email'];
        $confEmail = $_POST['conf_email'];
        $contrasenia = $_POST['contrasenia'];
        $confContrasenia = $_POST['conf_contrasenia'];

        $parsedDate = $this->parseDate($_POST['fecha_nacimiento']); # llega con el formato aaaa-mm-dd
        $isDateValid = false;
        if((count($parsedDate) == 3) && checkdate($parsedDate[1], $parsedDate[2], $parsedDate[0])) $isDateValid = true;

        $isEmailValid = $email == $confEmail;
        if ($isEmailValid && filter_var($email, FILTER_VALIDATE_EMAIL)) $isEmailValid = true;

        $isPassValid = ($contrasenia == $confContrasenia) && (strlen($contrasenia) > 7);

        if ($nombre && $apellido && $celular && $isEmailValid && $celular && $isEmailValid  && $isPassValid) $this->register(true, true);
        else $this->register(true, false);
    }

    public function resetPassword($procesado = false){
        require $this->viewsDir . 'reset_password_view.php';
    }

    public function resetPasswordProcess(){
        $this->titulo = 'Reestablecer Contraseña';
        $this->form = $_POST;

        # validation

        $this->resetPassword(true);
    }

    public function about(){
        $this->titulo = '¿Quiénes Somos?';
        require $this->viewsDir . 'about_view.php';
    }

    public function services(){
        $this->titulo = 'Nuestros Servicios';
        require $this->viewsDir . 'services_view.php';
    }

    public function coverages($busqueda = false, $isValid = false, $resultado = []){
        $this->titulo = 'Coberturas';
        require $this->viewsDir . 'coverages_view.php';
    }

    public function coveragesProcess(){
        $this->titulo = 'Coberturas';
        $busqueda = $_POST["busqueda"];
        $resultado = [];
        if (!$busqueda)  # Validacion del formulario
            $this->coverages(true, false, $resultado);
        else {
            if (strlen($busqueda) < 6) $resultado = ['opcion 1', 'opcion 2', 'opcion 3']; # Simulo obtener una respuesta de una base de datos
            $this->coverages(true, true, $resultado);
        }
    }

    public function turns($notification = false, $isValid = false){
        $this->titulo = 'Turnos';
        $notification_type = $isValid ? SUCCESS : ERROR;
        $notification_text = $isValid ? 'Turno reservado con éxito' : 'Error en la reserva del turno';
        require $this->viewsDir . 'turns_view.php';
    }
    
    public function turnsProcess(){
        $this->titulo = 'Turnos';
        
        $keys = [];
        $values = [];
        foreach ($_POST as $key => $value){
            array_push($keys, $key);
            array_push($values, $this->sanityCheck($value));
        }
        $post = array_combine($keys, $values);

        $especialista = $post['especialista'];
        $especialidad = $post['especialidad'];
        $dia =          $post['dia'];
        $orden =        $post['orden_medica']; 

        # Error si dan vacio: dia o (especialidad Y especialista) u orden.
        if(empty($dia) || (empty($especialidad) && empty($especialista)) || empty($orden)){
            $this->turns(true, false);
        }

        $dia = $this->parseDate($dia);
        
        # Agregar golpe a la db

        $this->turns(true, true);
    }

    public function parseDate($field){
        return explode('-', $field);
    }

    public function sanityCheck($field){
        $field = trim($field);
        $field = stripslashes($field);
        $field = htmlspecialchars($field);
        return $field;
    }

}
?>
