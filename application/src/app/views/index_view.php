<!DOCTYPE html>
<html lang="es-AR">
    <head>
        <?php
            require 'parts/head_view.php'
        ?>
        <link rel="stylesheet" href="styles/index.css"/>   
    </head>
    <body>
        <?php 
            require 'parts/header_view.php';
        ?>
        <main>
            <section>
                <h2>CARROUSEL</h2>
                <!-- <img src="../img/doctores2.jpg" width="300" alt="Imagen doctor"> -->
            </section>

            <section>
                <h2>NUESTROS SERVICIOS</h2>
                <ul>
                   <li><h3><a href="servicios/audiologia.html" target="_self">Audiología</a></h3></li>
                   <li><h3><a href="servicios/cardiologia.html" target="_self">Cardiología</a></h3></li>
                   <li><h3><a href="servicios/densitometria.html" target="_self">Densitometría</a></h3></li>
                   <li><h3><a href="servicios/ecografia_doppler.html" target="_self">Ecografía Doppler</a></h3></li>
                </ul>
                <a href="services.html" target="_self" class="boton">Ver más</a>
            </section>        
        </main>

        <?php 
            require 'parts/footer_view.php';
        ?>
    </body>
</html>
