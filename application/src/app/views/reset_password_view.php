<!DOCTYPE html>
<html lang="es-AR">

<head>
    <?php
    require 'parts/head_view.php'
    ?>
    <link rel="stylesheet" type='text/css' href="assets/css/form.css" />
    <link rel="stylesheet" type='text/css' href="assets/css/notification.css" />
</head>

<body>
    <?php
    require 'parts/header_view.php';
    ?>
    <main>
        <?php require 'parts/notification_view.php' ?>
        <section>
            <h2>REESTABLECER CONTRASEÑA</h2>
            <form action="#" method="POST" target="_self">
                <fieldset>
                    <label for="email">Email de la cuenta a recuperar</label>
                    <input type="email" id="email" name="email" placeholder="ejemplo@email.com" autofocus required tabindex="1" /><br>
                </fieldset>

                <input type="submit" value="Enviar" class="boton" />

            </form>
        </section>
    </main>

    <?php
    require 'parts/footer_view.php';
    ?>
</body>

</html>