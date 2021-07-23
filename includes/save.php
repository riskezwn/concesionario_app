<?php
// TODO poder crear y modificar stock a 0
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
    } elseif (isset($_POST['createseller'])) {
        
        $nombre = !empty($_POST['nombre']) ? mysqli_real_escape_string($con, sanitize($_POST['nombre'])) : false;
        $apellidos = !empty($_POST['apellidos']) ? mysqli_real_escape_string($con, sanitize($_POST['apellidos'])) : false;
        $email = !empty($_POST['email']) ? mysqli_real_escape_string($con, sanitize($_POST['email'])) : false;
        $pass = !empty($_POST['pass']) ? sanitize($_POST['pass']) : false;
        $salario = !empty($_POST['salario']) ? (int) mysqli_real_escape_string($con, sanitize($_POST['salario'])) : false;
        $comision = !empty($_POST['comision']) ? (float) mysqli_real_escape_string($con, sanitize($_POST['comision'])) : false;
        $cargo = !empty($_POST['cargo']) ? (int) mysqli_real_escape_string($con, sanitize($_POST['cargo'])) : false;
        $grupo = !empty($_POST['grupo']) ? (int) mysqli_real_escape_string($con, sanitize($_POST['grupo'])) : false;
        $responsable = !empty($_POST['jefe']) ? (int) mysqli_real_escape_string($con, sanitize($_POST['jefe'])) : null;

        
        // Validar los datos
        $errors = [];
        if (!checkString($nombre) || !checkString($apellidos)) {
            $errors['nombre-apellidos'] = 'La marca o el modelo no son válidos';
        } elseif (!checkInt($cargo)) {
            $errors['cargo'] = 'Debes introducir un cargo válido';
        } elseif (!checkInt($salario)) {
            $errors['salario'] = 'Introduce un salario correcto';
        } elseif (!is_float($comision)) {
            $errors['comision'] = 'Introduce un valor de comisión correcto';
        } elseif (!checkInt($grupo)) {
            $errors['comision'] = 'Introduce un grupo válido';    
        } elseif (!checkInt($responsable)) {
            $errors['responsable'] = 'El empleado debe tener un responsable válido';    
        } elseif (!is_string($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'El email no es válido o ya existe';
        } if (!is_string($pass) || strlen($pass) < 8) {
            $errors['pass'] = 'La contraseña debe tener al menos 8 caracteres';
        }

        var_dump($errors);
        if (count($errors) > 0) {
            $_SESSION['errors'] = $errors;
            header("Location: ../create_seller.php");
        } else {
            $secure_pass = password_hash($pass, PASSWORD_DEFAULT);
            if ($create = createSeller($con, $nombre, $apellidos, $email, $secure_pass, $cargo, $salario, $comision, $grupo, $responsable)) {
                $_SESSION['db'] = true;
            } else {
                $_SESSION['db'] = false;
            }
            echo mysqli_error($con);
            header("Location: ../create_seller.php");
        }
    }

} else {
    header('Location: index.php');
}
