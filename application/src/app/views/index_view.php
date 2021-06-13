<!DOCTYPE html>
<html lang="es-AR">

<head>
    <?php
    require 'parts/head_view.php'
    ?>
    <link rel="stylesheet" type='text/css' href="assets/css/index.css" />
    <link rel="stylesheet" type='text/css' href="assets/css/botones.css" />
    <script src="/js/components/Carrousel.js"></script>
</head>

<body>
    <?php
    require 'parts/header_view.php';
    ?>
    <main>
        <section id='carrousel'>
        </section>
        <section>
            <h2>NUESTROS SERVICIOS</h2>
            <ul>
                <li>
                    <h3><a href="services/audiologia" target="_self" class='button servicio'>Audiología</a></h3>
                </li>
                <li>
                    <h3><a href="services/cardiologia" target="_self" class='button servicio'>Cardiología</a></h3>
                </li>
                <li>
                    <h3><a href="services/densitometria" target="_self" class='button servicio'>Densitometría</a></h3>
                </li>
                <li>
                    <h3><a href="services/ecografia_doppler" target="_self" class='button servicio'>Ecografía Doppler</a></h3>
                </li>
                <li>
                    <h3><a href="services" target="_self" class='button servicio'>Ver más</a></h3>
                </li>
            </ul>
        </section>
    </main>

    <?php
    require 'parts/footer_view.php';
    ?>
</body>

</html>