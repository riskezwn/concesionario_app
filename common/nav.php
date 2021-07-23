<?php

require_once('includes/connect.php');
require_once('includes/redirect.php');
require_once('includes/helpers.php');

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/790908a15c.js" crossorigin="anonymous"></script>
    <title>Concesionario</title>
</head>
<body>
    <div class="container">
    <nav>
        <h1 class="nav-logo"><i class="fab fa-atlassian"></i> concesionario</h1>

        <div class="nav-container">
            <ul class="nav-list">
                <li class="li"><a href="index.php"><i class="fas fa-car"></i> Ver todos los coches</a></li>
                <li class="li"><a href="sellers.php"><i class="far fa-id-card"></i> Vendedores</a></li>
                <li class="li"><a href="customers.php"><i class="far fa-address-book"></i> Clientes</a></li>
                <li class="li"><a href="orders.php"><i class="fas fa-receipt"></i> Pedidos</a></li>
            
            </ul>
            <ul class="nav-list">
                <li class="li"><a href="#"><i class="far fa-user"></i> Cuenta</a></li>
                <li class="li"><a href="includes/logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></li>
            </ul>
        </div>
    </nav>