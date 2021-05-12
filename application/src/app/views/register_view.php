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
        <header>
            <a href="tel:+549234642-4593">+54 9 2346 42-4593</a>
            <ul>
                <li>
                    <a href="login.html" target="_self">Iniciar Sesión</a>        
                </li>
                <li>
                    <a href="register.html" target="_self">Registrarse</a>
                </li>
            </ul>
            <nav>
                <a href="index.html" target="_self">
                    <h1>Dental Medical Group</h1>
                </a>
                <a href="#">&#9776;</a>
                <ul>
                    <li>
                        <a href="about.html" target="_self">¿Quiénes Somos?</a>
                    </li>
                    <li>
                        <a href="services.html" target="_self">Nuestros Servicios</a>
                    </li>
                    <li>
                        <a href="coberturas.html" target="_self">Coberturas</a>
                    </li>
                    <li>
                        <a href="turnos.html" target="_self">Turnos</a>
                    </li>
                </ul>
            </nav>
        </header>


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

        <footer>
            <address>
                <p>El Grito de Alcorta N°110</p>
                <p>B6620 Chivilcoy</p>
                <p>Provincia de Buenos Aires</p>
            </address>
            <small>Dental Medical Group&trade; 2021</small>
            <ul>
                <li><a href="https://www.facebook.com/dentalmedicalgroup"><i class="gg-facebook"></i></a></li>
                <li><a href="https://www.instagram.com/dentalmedicalgroup"><i class="gg-instagram"></i></a></li>
                <li><a href="mailto:contacto@dentalmedicalgroup.com"><i class="gg-facebook"></i></a></li>
                <li><a href="https://www.linkedin.com/dentalmedicalgroup"><i class="gg-facebook"></i></a></li>
            </ul>
        </footer>
    </body>
</html>
