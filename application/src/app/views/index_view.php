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
        <title>Dental Medical Group</title>
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
