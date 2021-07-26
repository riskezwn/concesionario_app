<?php


if (isset($_POST)) {
    require_once('helpers.php');
    require_once('connect.php');

    // Recoger campos formulario
    $email = !empty($_POST['email']) ? mysqli_real_escape_string($con, sanitize($_POST['email'])) : false;
    $pass = !empty($_POST['password']) ? sanitize($_POST['password']) : false;

    // Comprobar errores
    $error = '';
    // Campo correo y contraseña
    if (!is_string($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || !$pass) {
        $error = 'Lo siento, las credenciales no coinciden';
        header('Location: ../access.php');

    }
   
    if ($error != '') {
        $_SESSION['error'] = $error;
    } else {
        $sql = "SELECT * FROM vendedores WHERE email = '$email'";
        $stmt = mysqli_query($con, $sql);

        if (mysqli_num_rows($stmt) == 1) {
            $userdata = mysqli_fetch_assoc($stmt);
            // Para comprobar una contraseña cifrada con password_hash() vamos a utilizar la función password_verify(texto introd, texto cifr)
            $checkPass = password_verify($pass, $userdata['clave']);
            if ($checkPass) {
                // Crear una sesión con los datos del usuario
                $_SESSION['userdata'] = $userdata;
                header('Location: ../index.php');
            } else {
                $error = 'Lo siento, las credenciales no coinciden';
                if ($error != '') $_SESSION['error'] = $error;
                header('Location: ../access.php');
            }
        } else {
            $error = 'Lo siento, las credenciales no coinciden';
            if ($error != '') $_SESSION['error'] = $error;
            header('Location: ../access.php');
        }






    }


} else {
    header('Location: access.php');
}