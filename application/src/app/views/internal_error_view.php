<!DOCTYPE html>
<html lang="es-AR">
    <head>
        <?php
            require 'parts/head_view.php'
        ?>
        <link rel="stylesheet" type='text/css' href="assets/css/index.css"/>   
    </head>
    <body>
        <?php 
            require 'parts/header_view.php';
        ?>
        
        <main>
            <h1><?= $titulo ?? "" ?></h2>   
        </main>
        <?php 
            require 'parts/footer_view.php';
        ?>
    </body>
</html>
