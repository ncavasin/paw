<!DOCTYPE html>
<html lang="es-AR">

<head>
    <?php

    use const Paw\core\database\FILE_SIZE_MAX;

    require 'parts/head_view.php'
    ?>
    <link rel="stylesheet" type='text/css' href="assets/css/form.css" />
    <link rel="stylesheet" type='text/css' href="assets/css/turnos.css" />
    <link rel='stylesheet' type='text/css' href='assets/css/notification.css' />
    <link rel='stylesheet' type='text/css' href='assets/css/botones.css' />
    <script src="/js/components/DragAndDrop.js"></script>
</head>

<body>
    <?php
    require 'parts/header_view.php';
    ?>

    <main>
        <?php require 'parts/notification_view.php'; ?>
        <section>
            <h2>BÚSQUEDA DE TURNOS</h2>
            <form action="" method="POST" id="form-turnos" target="_self" enctype="multipart/form-data">
                <fieldset>
                    <label for="especialidad">Especialidad</label>
                    <input list="especialidad-lista" id="especialidad" name="especialidad" placeholder="Kinesiología" autocomplete="off" autofocus tabindex="1" />

                    <label for="especialista">Especialista</label>
                    <input list="especialista-lista" id="especialista" name="especialista" placeholder="Fulano" autocomplete="off" tabindex="2" />

                        <!-- <?php
                            echo date('Y-m-d', time());
                        ?>
                        <?php
                            echo date('Y-m-d', strtotime(' +1 week'));
                        ?> -->

                    <label for='orden_medica' id='label_orden' class='label_orden'>Orden Médica
                        <input type="file" id='orden_medica' class="orden_medica input_hidden"
                                name='orden_medica' 
                                required accept="application/pdf" 
                                tabindex="4" 
                        />
                    </label>
                    <input type="reset" form="form-turnos" name="reset" value="Limpiar" class="limpiar"/>
                </fieldset>
            </form>
        </section>
    </main>

    <?php
    require 'parts/footer_view.php';
    ?>
</body>

</html>