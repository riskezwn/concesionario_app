<?php

if (isset($_POST)) {

    require_once('helpers.php');
    require_once('connect.php');

    if (isset($_POST['createcar'])) {
        $marca = !empty($_POST['marca']) ? mysqli_real_escape_string($con, sanitize($_POST['marca'])) : false;
        $modelo = !empty($_POST['modelo']) ? mysqli_real_escape_string($con, sanitize($_POST['modelo'])) : false;
        $precio = !empty($_POST['precio']) ? (int) mysqli_real_escape_string($con, sanitize($_POST['precio'])) : false;
        $stock = !empty($_POST['stock']) ? (int) mysqli_real_escape_string($con, sanitize($_POST['stock'])) : false;
        if (isset($_POST['activo'])) {
            $activo = 1;
        } else {
            $activo = 0;
        }

        // Validar los datos
        $errors = [];
        if (!checkString($marca) || !checkString($modelo)) {
            $errors['marcamodelo'] = 'La marca o el modelo no son válidos';
        }
        if (!checkInt($precio)) {
            $errors['precio'] = 'Introduce un precio correcto';
        }
        if (!checkInt($stock)) {
            $errors['stock'] = 'Introduce un stock correcto';
        }


        if (count($errors) > 0) {
            $_SESSION['errors'] = $errors;
          
        } else {
            if (isset($_SESSION['car_id'])) {
                $car_id = $_SESSION['car_id'];
                if ($create = editCar($con, $car_id, $marca, $modelo, $precio, $stock, $activo)) {
                    $_SESSION['db'] = true;
                } else {
                    $_SESSION['db'] = false;
                }
                destroySession('car_id');
                header("Location: ../edit_car.php?id=$car_id");
            } else {
                if ($create = createCar($con, $marca, $modelo, $precio, $stock, $activo)) {
                    $_SESSION['db'] = true;
                } else {
                    $_SESSION['db'] = false;
                }
                header("Location: ../create_car.php");
            }
        }
    }

} else {
    header('Location: index.php');
}
