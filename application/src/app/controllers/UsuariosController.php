<?php

namespace Paw\app\controllers;

use Paw\core\Controller;
use Paw\app\models\Usuario;

class UsuariosController extends Controller{


    public ?string $modelName = Usuario::class;

    public function __construct(){
        parent::__construct();
        
    }

    
    public function index(){

    }

    public function get(){

    }

}

?>