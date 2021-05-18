<!DOCTYPE html>
<html lang="es-AR">
    <head>
        <?php
            require 'parts/head_view.php'
        ?>
        <link rel="stylesheet" href="styles/form.css"/>
        <link rel="stylesheet" href="styles/turnos.css"/>
    </head>
    <body>
        <?php 
            require 'parts/header_view.php';
        ?>

        <main>
            <section>
                <h2>HISTORIAL DE TURNOS</h2>

                <table id="table-mis-turnos">
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
                        <tr>
                            <td class="especialidad">Resonancia</td>
                            <td class="especialista">Fulano</td>
                            <td class="fecha">16/04/2021</td>
                            <td class="hora">16:30</td>
                        </tr>
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
