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

    public function login($procesado = false, $is_valid = false){
        $titulo = 'Iniciar Sesión';
        require $this->viewsDir . 'login_view.php';
    }

    public function loginProcess(){
        $email = $_POST['email'];
        $contrasenia = $_POST['contrasenia'];
        # expresion regular de un formato de email valido
        $re = '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
        if (!$email || !preg_match($re, $email) || !$contrasenia) $this->login(false, false);
        else {
            # simulacion de consulta a la base de datos sobre si el usuario y contraseña esta bien
            if ($email == 'admin@admin.com' && $contrasenia == 'admin') $this->login(true, true);
            else $this->login(true, false);
        }
    }

    public function register($procesado = false){
        $titulo = 'Registrarse';
        require $this->viewsDir . 'register_view.php';
    }

    public function registerProcess(){
        $titulo = 'Registrarse';
        $form = $_POST;

        # validation
    
        $this->register(true);
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

    public function coverages($busqueda = false, $is_valid = false, $resultado = []){
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

    public function turns($procesado = false){
        $this->titulo = 'Turnos';
        require $this->viewsDir . 'turns_view.php';
    }
    
    public function turnsProcess(){
        $this->titulo = 'Turnos';
        $this->form = $_POST;

        # validation

        $this->turns(true);
    }
}
?>
