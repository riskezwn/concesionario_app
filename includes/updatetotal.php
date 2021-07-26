<?php
require_once('helpers.php');
require_once('connect.php');

$modelo = $_POST['modelo'];
$cantidad = $_POST['cantidad'];

$car = mysqli_fetch_assoc(getCars($con, $modelo));
$precio = (int) $car['precio'];

function getTotal($precio, $cantidad)
{   
    $result = "<div>Precio unitario: $precio €</div>
               <div class='total'>Total: " . $precio * $cantidad ." €";
    return $result;
}

echo getTotal($precio, $cantidad);