<!DOCTYPE html>
<html lang="es-AR">
    <head>
        <?php
            require 'parts/head_view.php'
        ?>
        <link rel="stylesheet" href="styles/index.css"/>   
    </head>
    <body>
        <h1><?= $title ?? "" ?></h2>    
        <?php 
            require 'parts/header_view.php';
        ?>

        <main>
 
        </main>

        <?php 
            require 'parts/footer_view.php';
        ?>
    </body>
</html>
