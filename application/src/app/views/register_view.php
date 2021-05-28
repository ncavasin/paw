<!DOCTYPE html>
<html lang="es-AR">

<head>
    <?php require 'parts/head_view.php'    ?>
    <link rel='stylesheet' type='text/css' href='assets/css/form.css' />
    <link rel='stylesheet' type='text/css' href='assets/css/notification.css' />
    <link rel='stylesheet' type='text/css' href='assets/css/botones.css'/>
</head>

<body>
    <?php require 'parts/header_view.php';    ?>
    <main>
        <section>
            <?php require 'parts/notification_view.php'; ?>
            <h2>REGISTRARSE</h2>

            <!--<img src="/assets/img/Imagen_Registrar.jpg" alt="Imagen para Registrarse" width="300">-->

            <form action="#" method="POST" target="_self">
                <fieldset>
                    <label for="nombre">Nombre (*)</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Fulano" autofocus required tabindex="1" autocomplete="on" />

                    <label for="apellido">Apellido (*)</label>
                    <input type="text" id="apellido" name="apellido" placeholder="De tal" required tabindex="2" autocomplete="on" />

                    <label for="fecha_nacimiento">Fecha de Nacimiento (*)</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required tabindex="3" autocomplete="on" />
                </fieldset>

                <fieldset>
                    <!-- pattern="+[0-9]{2}[0-9]{1}[0-9]{4}"-->
                    <label for="celular">Celular (*)</label>
                    <input type="tel" id="celular" name="celular" placeholder="+54 9 1144556677" required tabindex="4" autocomplete="on" />
                </fieldset>

                <fieldset>
                    <label for="email">Correo Electrónico (*)</label>
                    <input type="email" id="email" name="email" placeholder="usuario@correo.com" required tabindex="5" autocomplete="on" />

                    <label for="conf_email">Confirmación (*)</label>
                    <input type="email" id="conf_email" name="conf_email" placeholder="usuario@correo.com" required tabindex="6" />
                </fieldset>

                <fieldset>
                    <label for="contrasenia">Contraseña (*)</label>
                    <input type="password" id="contrasenia" name="contrasenia" placeholder="Contraseña" required tabindex="7" />

                    <label for="conf_contrasenia">Confirmación (*)</label>
                    <input type="password" id="conf_contrasenia" name="conf_contrasenia" placeholder="Contraseña" required tabindex="8" />
                </fieldset>
                <input type="submit" value="Registrarse" class="main_button" />
            </form>
        </section>
    </main>

    <?php require 'parts/footer_view.php';    ?>
</body>

</html>