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
        require 'parts/nav_view.php';
        ?>
        <header>
            <a href="tel:+549234642-4593">+54 9 2346 42-4593</a>
            <ul>
                <li>
                    <a href="login.html" target="_self">Iniciar Sesión</a>        
                </li>
                <li>
                    <a href="register.html" target="_self">Registrarse</a>
                </li>
            </ul>
            <nav>
                <a href="index.html" target="_self">
                    <h1>Dental Medical Group</h1>
                </a>
                <a href="#">&#9776;</a>
                <ul>
                    <li>
                        <a href="about.html" target="_self">¿Quiénes Somos?</a>
                    </li>
                    <li>
                        <a href="services.html" target="_self">Nuestros Servicios</a>
                    </li>
                    <li>
                        <a href="coberturas.html" target="_self">Coberturas</a>
                    </li>
                    <li>
                        <a href="turnos.html" target="_self">Turnos</a>
                    </li>
                </ul>
            </nav>
        </header>

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
