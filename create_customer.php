<?php
// TODO Poder crear empleado sin jefe
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
    <h3>Añadir un cliente</h3>
    <form action="includes/save.php" class="form" method="POST">

        <div class="form-group">
            <label for="nombre">Nombre y apellidos</label>
            <input type="text" name="nombre" id="nombre">
        </div>
        <div class="form-group">
            <label for="ciudad">Ciudad</label>
            <select name="ciudad" id="ciudad">
                <?php
                $cities = ['Valladolid', 'Madrid', 'Barcelona', 'Málaga', 'Zaragoza', 'Bilbao', 'Sevilla', 'A Coruña'];
                foreach ($cities as $value) :
                ?>
                    <option value="<?= $value ?>"><?= $value ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Activo</label>
            <label class="switch"><input type="checkbox" name="activo" checked />
                <div></div>
            </label>
        </div>
        <input type="hidden" name="createcustomer">
        <input type="submit" value="añadir" class="form-button">
        </div>

    </form>
</main>



<?php
destroySession('errors');
destroySession('db');
require_once('common/footer.php');
?>