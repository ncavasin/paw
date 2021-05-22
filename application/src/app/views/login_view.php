<!DOCTYPE html>
<html lang="es-AR">
    <head>
        <?php
            require 'parts/head_view.php'
        ?>
        <link rel='stylesheet' type='text/css' href='assets/css/form.css' />
        <link rel='stylesheet' type='text/css' href='assets/css/login.css' />
        <link rel='stylesheet' type='text/css' href='assets/css/notification.css' />
    </head>
    <body>
        <?php 
            require 'parts/header_view.php';
        ?>
        <main>
            <?php require 'parts/notification_view.php'; ?>
            <section>
                <h2>INICIAR SESIÓN</h2>
                <?php if ($procesado) : ?>
                    <?php if ($is_valid) : ?>
                        <p style='color: green'>Logeado con éxito</p>
                    <?php else : ?>
                        <p style='color: red'>Usuario o contraseña incorrecto</p>
                    <?php endif; ?>
                <?php endif; ?>
                <form action="#" method="POST" target="_self">
                    <fieldset>
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" id="email" name="email" 
                        placeholder="usuario@correo.com" 
                        required tabindex="1" autocomplete="on"/>
                        
                        <label for="contrasenia">Contraseña:</label>
                        <input type="password" id="contrasenia" name="contrasenia" 
                        placeholder="ultra secure password" 
                        required tabindex="2" autocomplete="on"/>
                    </fieldset>

                    <a href="/reset_password" target="_self">¿Olvidaste tu contraseña?</a>
                    <a href="/register" target="_self">Registrarse</a>

                    <input type="submit" value="Ingresar" class="boton"/>
                </form>
            </section>        
        </main>
        
        <?php 
            require 'parts/footer_view.php';
        ?>
    </body>
</html>
