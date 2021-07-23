<?php
// TODO Mostrar errores al crear coche
require_once('common/nav.php');



?>
<main class="create-car">
    <?php
    if (isset($_SESSION['errors'])) {
        foreach ($_SESSION['errors'] as $key => $value) {
            echo showErrors($value);
        }
    } elseif (isset($_SESSION['db'])) {
        echo showDBError($_SESSION['db'], $con);
    }
    ?>
    <h3>Hacer pedido</h3>
    <form action="includes/save.php" class="form" method="POST">
        <div class="form-group">
            <label for="cliente">Cliente</label>
            <select name="cliente" id="cliente">
                <?php
                if ($customers = getCustomers($con, null, $_SESSION['userdata']['id'])) :
                    while ($customer = mysqli_fetch_assoc($customers)) :
                ?>
                        <option value="<?= $customer['id'] ?>"><?= $customer['nombre'] ?></option>
                    <?php
                    endwhile;
                elseif (checkAdminPermissions($con, $_SESSION['userdata']['id'], 3)) :
                    $customers = getCustomers($con);
                    while ($customer = mysqli_fetch_assoc($customers)) :
                    ?>
                        <option value="<?= $customer['id'] ?>"><?= $customer['nombre'] ?></option>
                    <?php
                    endwhile;
                else :
                    ?>
                    <option value="0">Todavía no tienes ningún cliente</option>
                <?php
                endif;
                ?>
            </select>
        </div>
        <div class="form-group">
                <label for="modelo">Modelo </label>
                <select name="modelo" id="modelo">
                    <?php
                    if ($cars = getCars($con)) :
                        while ($car = mysqli_fetch_assoc($cars)) :
                    ?>
                    <option value="<?=$car['id']?>"><?=$car['marca']?> <?=$car['modelo']?> | Stock: <?=$car['stock']?></option>
                    <?php
                        endwhile;
                    endif;
                    ?>
                   
                </select>
            </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" min="1" value="1">
        </div>
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha" >
        </div>
        
        <input type="hidden" name="createorder">
        <input type="submit" value="enviar" class="form-button">

    </form>
</main>



<?php
destroySession('errors');
destroySession('db');
require_once('common/footer.php');
?>