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
        <link rel="stylesheet" href="styles/turnos.css"/>
        
    

        <title>Dental Medical Group</title>
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
