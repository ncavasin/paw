<!DOCTYPE html>
<html lang="es-AR">
    <head>
        <?php
            require 'parts/head_view.php'
        ?>
        <style>
            <?php include 'styles/reset.css' ?>
            <?php include 'styles/icono.min.css' ?>
            <?php include 'styles/header_footer.css' ?>
            <?php include 'styles/main.css' ?>
            <?php include 'styles/form.css' ?>
            <?php include 'styles/login.css' ?>
        </style>
    </head>
    <body>
        <?php 
            require 'parts/header_view.php';
        ?>

        <main>
            <section>
                <h2>INICIAR SESIÓN</h2>
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
