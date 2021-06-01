<?php

namespace Paw\app\controllers;

use Paw\core\Controller;
use Paw\app\models\Turno;
use PhpOption\None;
use Paw\core\database\Constants;

class TurnosController extends Controller{

    public ?string $modelName = Turno::class;

    # Lista todos los turnos disponibles a una fecha y hora det
    public function nuevoTurno(){
        $finfo =        finfo_open(FILEINFO_MIME_TYPE);
        $timestamp =    time();
        $targetDir =    "./files/";
        $tempName =     $_FILES['orden_medica']['tmp_name'];
        $fileSize =     $_FILES['orden_medica']['size'];
        $newFileName =  $targetDir . $_FILES['orden_medica']['name'] . '--' . $timestamp; # el -- es para despues parsear el nombre y devolver el original
        $mimeType =     finfo_file($finfo, $tempName);

        finfo_close($finfo);

        if (file_exists($newFileName))
            null; #$this->turns(true, false, 'Error al subir el archivo: Ya existe');
        else if ($fileSize > Constants::getFileSize())
            null; # $this->turns(true, false, "Tamaño de archivo excedido. Limite 10Mb.");
        else if (!($mimeType == 'application/pdf')) {
            null; # $this->turns(true, false, 'El archivo no tiene una extensión válida (PDF)');
        }
    }

    # Lista un solo turno
    public function getTurnos(){
        $turnosCollection = $this->model->getAll();
        var_dump($turnosCollection);die;
    }

}

?>