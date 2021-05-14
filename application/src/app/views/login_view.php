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
        <link rel="stylesheet" href="styles/form.css"/>
        <link rel="stylesheet" href="styles/login.css"/>
    

        <title>Dental Medical Group</title>
    </head>
    <body>
        <?php 
            require 'parts/header_view.php';
        ?>

        <main>
            <section>
                <h2>INICIAR SESIÓN</h2>
                
                <!-- <img src="../img/Imagen_IniciarSesion.jpg" alt="Imagen para Inicio de Sesión" width="300px"> -->

                <form action="#" method="POST" target="_self">
                    <fieldset>
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" id="email" name="email" 
                        placeholder="usuario@correo.com" 
                        required autofocus tabindex="1" autocomplete="on"/>
                        
                        <label for="contrasenia">Contraseña:</label>
                        <input type="password" id="contrasenia" name="contrasenia" 
                        placeholder="ultra secure password" 
                        required tabindex="2" autocomplete="on"/>
                    </fieldset>

                    <a href="reset_password.html" target="_self">¿Olvidaste tu contraseña?</a>
                    <a href="register.html" target="_self">Crear cuenta</a>

                    <input type="submit" value="Ingresar" class="boton"/>
                </form>
            </section>        
        </main>
        <?php 
            require 'parts/footer_view.php';
        ?>
    </body>
</html>
