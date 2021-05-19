<!DOCTYPE html>
<html lang="es-AR">
    <head>
        <?php
            require 'parts/head_view.php'
        ?>
        <link rel="stylesheet" type='text/css' href="assets/css/form.css"/>
        <link rel="stylesheet" type='text/css' href="assets/css/turnos.css"/>
    </head>
    <body>
        <?php 
            require 'parts/header_view.php';
        ?>

        <main>
            <section>
                <h2>BÚSQUEDA DE TURNOS</h2>
                <form action="#" method="POST" id="form-turnos" target="_self">
                    <fieldset>
                        <label for="especialidad">Especialidad:</label>
                        <input list="especialidad-lista" id="especialidad" name="especialidad" 
                        placeholder="Kinesiología" 
                        autofocus tabindex="1"/>

                        <datalist id="especialidad-lista">
                            <option value="Audiometría">
                            <option value="Cardiología">
                            <option value="Densitometría">
                            <option value="Ecografía Doppler">
                        </datalist>

                        <label for="especialista">Especialista:</label>
                        <input list="especialista-lista" id="especialista" name="especialista" 
                        placeholder="Fulano" 
                        tabindex="2"/>
                        <datalist id="especialista-lista">
                            <option value="Fulano">
                            <option value="Mengano">
                            <option value="Sultan">
                            <option value="Juan Doe">
                        </datalist>

                        <label for="dia">Dia:</label>
                        <input type="date" id="dia" name="dia" 
                        required tabindex="3"/>
                    </fieldset>             
                           
                    <input type="submit" name="busqueda" value="Buscar" class="boton"/>
                    <input type="reset" name="reset" value="Limpiar" class="limpiar"/>
                </form>
                <h2>TURNOS DISPONIBLES</h2>
                <table>
                    <colgroup>
                        <col>
                        <col>
                        <col>
                        <col>
                    </colgroup>
                    <thead>
                        <tr>
                            <th>Especialidad</th><th>Especialista</th><th>Fecha</th><th>Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="especialidad">Resonancia</td>
                            <td class="especialista">Fulano</td>
                            <td class="fecha">16/04/2021</td>
                            <td class="hora">16:30</td>
                        </tr>
                    </tbody>
                </table>
            </section>        
        </main>

        <?php 
            require 'parts/footer_view.php';
        ?>
    </body>
</html>
