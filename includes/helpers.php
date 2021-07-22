<?php

// Senear variables de un formulario
function sanitize($v)
{
    $v = trim($v);
    $v = strip_tags($v);
    return $v;
}
// Eliminar sesion
function destroySession($session)
{
    if (isset($_SESSION[$session])) {
        unset($_SESSION[$session]);
    }
}
function showErrors($error, $field = null)
{
    $result = '';
    if (isset($error)) {
        $result = "<div class='error'><i class='fas fa-exclamation-circle'></i>$error</div>";
    }
    return $result;
}
function showDBError($status)
{
    if ($status) {
        $result = "<div class='msg'><i class='fas fa-exclamation-circle'></i>Se ha guardado correctamente</div>";
    } else {
        $result = "<div class='error'><i class='fas fa-exclamation-circle'></i>Ha habido un error al guardar en la base de datos</div>";
    }
    return $result;
}
function checkString($v)
{
    $result = false;
    if (is_string($v) && preg_match('/^[A-Za-zÀ-ÿ0-9 ]+$/', $v)) {
        $result = true;
    }
    return $result;
}
function checkInt($v)
{
    $result = false;
    if (is_int($v) ) {
        $result = true;
    }
    return $result;
}

// DB functions

function getCars($con, $id = null)
{
    $sql = "SELECT * FROM coches ";
    if (isset($id)) {
        $sql .= "WHERE id = '$id'";
    }
    $stmt = mysqli_query($con, $sql);

    $result = false;
    if ($stmt && mysqli_num_rows($stmt) >= 1) {
        $result = $stmt;
    }
    return $result;
}

function createCar($con, $marca, $modelo, $precio, $stock, $activo )
{
    $sql = "INSERT INTO coches (marca, modelo, precio, stock, activo)
    VALUES ('$marca', '$modelo', $precio, $stock, $activo) ";

    $stmt = mysqli_query($con, $sql);
    $result = false;
    if ($stmt) $result = true;
    return $result;
}
function editCar($con, $id, $marca, $modelo, $precio, $stock, $activo )
{
    $sql = "UPDATE coches SET 
            marca = '$marca',
            modelo = '$modelo',
            precio = $precio,
            stock = $stock,
            activo = $activo
            WHERE id = $id";

    $stmt = mysqli_query($con, $sql);
    $result = false;
    if ($stmt) $result = true;
    return $result;
}

function getSellers($con, $id = null)
{
    $sql = "SELECT v.*,
            DATE_FORMAT(v.fecha_alta, '%d-%m-%Y') AS antiguedad,
            g.nombre AS grupo,
            CONCAT (j.nombre, ' ', j.apellidos) AS jefe
            FROM vendedores v 
                INNER JOIN grupos g ON v.grupo_id = g.id
                LEFT JOIN vendedores j ON v.jefe_id = j.id
                ";
    if (isset($id)) {
        $sql .= "WHERE id = '$id'";
    }
    $stmt = mysqli_query($con, $sql);

    $result = false;
    if ($stmt && mysqli_num_rows($stmt) >= 1) {
        $result = $stmt;
    }
    return $result;
}
