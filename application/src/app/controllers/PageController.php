<?php

namespace Paw\app\controllers;

class PageController{

    public string $viewsDir;
    private array $contact;
    public array $userOptions;
    public array $menuOptions;
    public array $footerLinks;
    private $__MAXFSIZE;

    public function __construct(){

        # 10Mb = 10.000Kb
        define ("_MAXFILESIZE", 10000, true);

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

    public function register($notification = false, $isValid = false, $notification_text = 'Uno o mas campos no son validos'){
        $titulo = 'Registrarse';
        $notification_type = $isValid? SUCCESS : ERROR;
        $notification_text = $isValid? 'Registro completado con éxito' : 'Uno o mas campos no son validos';
        require $this->viewsDir . 'register_view.php';
    }

    private function validateEmail($email) {
        if ($this->sanityCheck($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) return true;
        return false;
    }

    private function validateDate($date) {
        if (!$this->sanityCheck($date)) return false;
        $parsedDate = $this->parseDate($_POST['fecha_nacimiento']); # llega con el formato aaaa-mm-dd
        if((count($parsedDate) == 3) && checkdate($parsedDate[1], $parsedDate[2], $parsedDate[0])) return true;  
        return false;
    }

    private function validatePassword($pass) {
        return $this->sanityCheck($pass) && strlen($pass) > 7;
    }

    public function registerProcess(){
        # array para saber si vienen los campos requeridos y validarlos segun sus requisitos
        $requiredValues = [
            'nombre' => ['label' => 'Nombre'],
            'apellido' => ['label' => 'Apellido'],
            'celular' => ['label' => 'Celular'],
            'email' => ['label' => 'Email', 'validate' => function ($email) {return $this->validateEmail($email);}],
            'contrasenia' => ['label' => 'Confirmar contraseña', 'validate' => function ($pass) { return $this->validatePassword($pass);}],
            'fecha_nacimiento' => ['label' => 'Fecha de nacimiento', 'validate' => function ($date) {$this->validateDate($date);}],
        ];
        # valido los campos
        foreach($requiredValues as $key => $value)
            if ($value['validate']) { # me fijo si tiene un metodo para validar especifico
                if (!$value['validate']($_POST[$key])) # si lo tiene, lo ejecuto
                    $this->register(true, false, "El campo \"{$value['label']}\" no tiene un formato valido"); # si no es valido respondo con mensaje personalizado
            } else if(!$this->sanityCheck($_POST[$key])) # si no tiene personalizado, uso el general
                $this->register(true, false, "El campo  \"{$value['label']}\" no puede estar vacío");
        # valido los campos que requieren confirmacion
        if ($_POST['email'] != $_POST['conf_email']) $this->register(true, false, 'Los email no coinciden');
        if ($_POST['contrasenia'] != $_POST['conf_contrasenia']) $this->register(true, false, 'Las contraseñas no coinciden');

        # en este punto los datos estan validados y se guardarian en la base de datos
        # try{
        #    guardar formulario
        #    if ok then $this->register(true, true, 'Registro completado con éxito');
        #    else error
        #} catch then error

        $this->register(true, true, 'Registro completado con éxito');
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
            array_push($keys, $this->sanityCheck($key));
            array_push($values, $this->sanityCheck($value));
        }
        $post = array_combine($keys, $values);

        $especialista = $post['especialista'];
        $especialidad = $post['especialidad'];
        $dia =          $post['dia'];
        $orden =        $post['orden_medica']; 

        if(empty($dia) || (empty($especialidad) && empty($especialista)) || empty($orden)){
            return $this->turns(true, false);            
        }

        $dia = $this->parseDate($dia);

        # Handling upload
        $timestamp =    time();
        $targetDir =    '/public/';
        $targetName =   $targetDir . $_FILES['orden_medica']['name'];
        $targetDbName = $targetDir . $timestamp;
        $targetType =   $_FILES['orden_medica']['type'];
        $targetSize =   $_FILES['orden_medica']['size'];

        if (file_exists($targetName)){
            return $this->turns(true, false);
        }

        if ($targetSize > constant('_MAXFILESIZE')){
            return $this->turns(true, false);
        }

        if (! $targetType == 'application/pdf'){
            return $this->turns(true, false);
        }

        
        # Add db hit
        # Mapping between timestamp and filename
        #. $_FILES['orden_medica']['name'];

        return $this->turns(true, true);
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
