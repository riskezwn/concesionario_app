<?php

require_once('includes/connect.php');
require_once('includes/helpers.php');

if (isset($_SESSION['userdata'])) {
    header('Location: index.php');
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/normalize.css" />
    <link rel="stylesheet" href="assets/css/login.css" />
    <title>Iniciar sesión</title>
</head>

<body>
    <header>

    </header>
    <main>
        <?php
        if (isset($_SESSION['error'])) {
                echo showErrors($_SESSION['error']);
        }
        ?>
        <h2>acceso empleados</h2>
        <form class="login_box" method="POST" action="includes/login.php">
            <div class="form_group">
                <label for="email">email</label>
                <input type="email" name="email" id="email" placeholder="&#xf508;  user@example.com" />
            </div>
            <div class="form_group">
                <label for="password">contraseña</label>
                <input type="password" name="password" id="password" placeholder="&#xf084;  &#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" />
            </div>
            <button class="submit">iniciar sesión</button>
        </form>
    </main>

    <script src="https://kit.fontawesome.com/790908a15c.js" crossorigin="anonymous"></script>
    <script src="js/login.js"></script>
<?php destroySession('error') ?>
</body>

</html>