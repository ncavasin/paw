<!DOCTYPE html>
<html lang="es-AR">
    <head>
        <meta lang="es" charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap">
        <link rel="stylesheet" href="styles/reset.css"/>
        <link rel="stylesheet" href="styles/icono.min.css">  
        <link rel="stylesheet" href="styles/header_footer.css"/>    
        <link rel="stylesheet" href="styles/main.css"/>   
        <link rel="stylesheet" href="styles/index.css"/>   
        <title>Server internal error</title>
    </head>
    <body>
        <?php 
            require 'parts/header_view.php';
        ?>

        <main>
            <h2>Server Interal Error</h2>    
            <?php
                require 'parts/nav_view.php';
            ?>
        </main>

        <footer>
            <address>
                <p>El Grito de Alcorta N°110</p>
                <p>B6620 Chivilcoy</p>
                <p>Provincia de Buenos Aires</p>
            </address>
            <small>Dental Medical Group&trade; 2021</small>
            <ul>
                <li><a href="https://www.facebook.com/dentalmedicalgroup"><i class="gg-facebook"></i></a></li>
                <li><a href="https://www.instagram.com/dentalmedicalgroup"><i class="gg-instagram"></i></a></li>
                <li><a href="mailto:contacto@dentalmedicalgroup.com"><i class="gg-facebook"></i></a></li>
                <li><a href="https://www.linkedin.com/dentalmedicalgroup"><i class="gg-facebook"></i></a></li>
            </ul>
        </footer>
    </body>
</html>
