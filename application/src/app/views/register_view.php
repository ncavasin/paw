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
                <h2>REGISTRARSE</h2>
                
                <!--<img src="../img/Imagen_Registrar.jpg" alt="Imagen para Registrarse" width="300">-->

                <form action="#" method="POST" target="_self">
                    <fieldset>
                        <label for="pnom">Nombre</label>
                        <input type="text" id="pnom" name="pnom" 
                        placeholder="Fulano" autofocus 
                        required tabindex="1" autocomplete="on"/>
                    
                        <label for="ape">Apellido</label>
                        <input type="text" id="ape" name="ape" 
                        placeholder="De tal" required tabindex="2" autocomplete="on"/>
                    
                        <label for="fnac">Fecha de Nacimiento:</label>
                        <input type="date" id="fnac" name="fnac" 
                        required tabindex="3" autocomplete="on"/>
                    </fieldset>
                    
                    <fieldset>
                        <!-- pattern="+[0-9]{2}[0-9]{1}[0-9]{4}"-->
                        <label for="celular">Celular</label>
                        <input type="tel" id="celular" name="celular" 
                        placeholder="+54 9 1144556677" 
                        required tabindex="4" autocomplete="on"/>
                    </fieldset>

                    <fieldset>
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" id="email" name="email"
                        placeholder="usuario@correo.com" 
                        required tabindex="5" autocomplete="on"/>

                        <label for="conf_email">Confirmación:</label>
                        <input type="email" id="conf_email" name="conf_email"
                        placeholder="usuario@gmail.com" 
                        required tabindex="6"/>
                    </fieldset>

                    <fieldset>
                        <label for="contrasenia">Contraseña:</label>
                        <input type="password" id="contrasenia" name="contrasenia" 
                        placeholder="Contraseña" 
                        required tabindex="7"/>
                    
                        <label for="conf_contrasenia">Confirmación:</label>
                        <input type="password" id="conf_contrasenia" name="conf_contrasenia" 
                        placeholder="Contraseña" 
                        required tabindex="8"/>
                    </fieldset>              
                    <input type="submit" value="Registrarse" class="boton"/>
                </form>
            </section>        
        </main>

        <?php 
            require 'parts/footer_view.php';
        ?>
    </body>
</html>