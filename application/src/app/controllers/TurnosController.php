<?php

namespace Paw\app\controllers;

use Paw\core\Controller;
use Paw\app\models\Turnos;

class TurnosController extends Controller{


    public ?string $modelName = Turnos::class;

    public function __construct(){
        parent::__construct();
        
    }

    # Lista todos los turnos disponibles a una fecha y hora det
    public function index(){

    }

    # Lista un solo turno
    public function getTurno(){

    }

    # Reserva un turno
    public function setTurno(){
        
    }

}

?>