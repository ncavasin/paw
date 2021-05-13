<?php

namespace Paw\app\controllers;

class PageController{

    public string $viewsDir;
    public array $menu;
    public array $userOptions;

    public function __construct(){
        $this->viewsDir = __DIR__ . "/../views/";

        $this->userOptions = [
            [
                'href' => 'tel:+549234642-4593',
                'name' => '+54 9 2346 42-4593'
            ],
            [
                'href' => '/login',
                'name' => 'Ingresar'
            ],
            [
                'href' => '/register',
                'name' => 'Registrarse'
            ]
        ];

        $this->menu = [
            [ 
                'href' => '/',
                'name' => 'Home'
            ],
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
    }

    public function index(){
        $main = "HOME AMEO";
        require $this->viewsDir . 'index_view.php';
    }

    public function login($procesado = false){

        require $this->viewsDir . 'login_view.php';

        # to-do: mostrar mensaje de exito usando el flag procesado 
    }


    public function loginProcess(){

        $form = $_POST;

        # validation

        $this->login(true);
    }


    public function register($procesado = false){

        require $this->viewsDir . 'register_view.php';
    }


    public function registerProcess(){

        $form = $_POST;

        # validation
    
        $this->register(true);
    }


    public function about(){

        require $this->viewsDir . 'about_view.php';
    }


    public function services(){

        require $this->viewsDir . 'services_view.php';
    }


    public function coverages(){
        $main = htmlspecialchars($_GET["var"] ?? "Nadia");
        require $this->viewsDir . 'coverages_view.php';
    }

    public function turns($procesado = false){

        require $this->viewsDir . 'turns_view.php';
    }


    public function turnsProcess(){

        $form = $_POST;

        # validation

        $this->turns(true);
    }

}
?>
