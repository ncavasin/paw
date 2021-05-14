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
    

        <title>Dental Medical Group</title>
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
