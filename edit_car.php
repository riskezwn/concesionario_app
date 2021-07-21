<?php
require_once('common/nav.php');
// TODO Comprobar errores al crear
destroySession('car_id');
// TODO Comprobar si el id existe
if (isset($_GET['id'])) {
    $car_id = (int) $_GET['id'];
    $car = mysqli_fetch_assoc(getCars($con, $car_id));
} else {
    header('Location: index.php');
}

?>
<main class="create-car">
    <?php
    if (isset($_SESSION['errors'])) {
        showErrors($_SESSION['errors']);
    } elseif (isset($_SESSION['db'])) {
        echo showDBError($_SESSION['db']);
    }
    ?>
    <h3>Editar <?= $car['marca'] . ' ' . $car['modelo'] ?></h3>
    <form action="includes/save.php" class="form" method="POST">
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" name="marca" id="marca" value="<?= $car['marca'] ?>">
        </div>
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo" value="<?= $car['modelo'] ?>">
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" value="<?= $car['precio'] ?>">
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" value="<?= $car['stock'] ?>">
        </div>
        <div class="form-group">
            <label for="">Activo</label>
            <label class="switch"><input type="checkbox" name="activo" <?php if ($car['activo']) : ?> checked <?php endif; ?> />
                <div></div>
            </label>
        </div>
        <input type="hidden" name="createcar">
        <input type="submit" value="editar" class="form-button">
    </form>
    <?php $_SESSION['car_id'] = $car_id ?>
</main>



<?php
destroySession('errors');
destroySession('db');

require_once('common/footer.php');
?>