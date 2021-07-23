<?php
// TODO Mostrar errores al crear coche
require_once('common/nav.php');
require_once('includes/restraccess.php');

destroySession('car_id');

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
    <h3>Añadir un coche</h3>
    <form action="includes/save.php" class="form" method="POST">
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" name="marca" id="marca">
        </div>
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo">
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio">
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock">
        </div>
        <div class="form-group">
            <label for="">Activo</label>
            <label class="switch"><input type="checkbox" name="activo" checked />
                <div></div>
            </label>
        </div>
        <input type="hidden" name="createcar">
        <input type="submit" value="añadir" class="form-button">
        
    </form>
</main>



<?php
destroySession('errors');
destroySession('db');
require_once('common/footer.php');
?>