<?php

namespace Paw\app\controllers;

class ErrorController{
    public $viewsDir;

    public array $menu;

    public function __construct(){
        $this->viewsDir = __DIR__ . "/../views/";

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

    public function notFound(){

            http_response_code(404);
            require $this->viewsDir . 'not_found_view.php';

    }

}
?>