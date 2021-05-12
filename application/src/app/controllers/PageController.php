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

    public function login(){

        require $this->viewsDir . 'login_view.php';
    }

    public function register(){

        require $this->viewsDir . 'register_view.php';
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

    public function turns(){

        require $this->viewsDir . 'turns_view.php';
    }


    public function not_found(){
        http_response_code(404);
        require $this->viewsDir . 'not_found_view.php';
    }
}

