<!DOCTYPE html>
<html lang="es-AR">
    <head>
        <?php
            require 'parts/head_view.php'
        ?>
        <link rel="stylesheet" type='text/css' href="assets/css/form.css"/>
    </head>
    <body>
        <?php 
            require 'parts/header_view.php';
        ?>


        <main>
            <section>
                
                <h2>REESTABLECER CONTRASEÑA</h2>
                <form action="#" method="POST" target="_self">
                    <fieldset>
                        <label for="contrasenia">Nueva contraseña:</label>
                        <input type="password" id="contrasenia" name="contrasenia"
                        placeholder="Contraseña" 
                        autofocus required tabindex="1"/><br>
                    
                        <label for="conf_contrasenia">Confirmación:</label>
                        <input type="password" id="conf_contrasenia" name="conf_contrasenia" 
                        placeholder="Contraseña" 
                        required tabindex="2"/><br>
                    </fieldset>

                    <input type="submit" value="Enviar" class="boton"/>
                    
                </form>
            </section>        
        </main>

        <?php 
            require 'parts/footer_view.php';
        ?>
    </body>
</html>
