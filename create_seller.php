<?php
// TODO Poder crear empleado sin jefe
require_once('common/nav.php');

?>
<main class="create-seller">
    <?php
    if (isset($_SESSION['errors'])) {
        foreach ($_SESSION['errors'] as $key => $value) {
            echo showErrors($value);
        }
    } elseif (isset($_SESSION['db'])) {
        echo showDBError($_SESSION['db']);
    }
    ?>
    <h3>Añadir un vendedor</h3>
    <form action="includes/save.php" class="form" method="POST">
        <div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre">
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="pass">Contraseña</label>
                <input type="password" name="pass" id="pass">
            </div>
            <div class="form-group">
                <label for="cargo">Cargo</label>
                <select name="cargo" id="cargo">
                    <?php
                    if ($groups = getGroups($con, 'cargos')) :
                        while ($group = mysqli_fetch_assoc($groups)) :
                    ?>
                    <option value="<?=$group['id']?>"><?=$group['nombre']?></option>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </select>
            </div>
        </div>
        <div>
            <div class="form-group">
                <label for="grupo">Grupo</label>
                <select name="grupo" id="grupo">
                    <?php
                    if ($groups = getGroups($con, 'grupos')) :
                        while ($group = mysqli_fetch_assoc($groups)) :
                    ?>
                    <option value="<?=$group['id']?>"><?=$group['nombre']?></option>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="salario">Salario</label>
                <input type="number" name="salario" id="salario">
            </div>
            <div class="form-group">
                <label for="comision">Comisión</label>
                <input type="number" name="comision" id="comision" step="0.1">
            </div>
            <div class="form-group">
                <label for="jefe">Responsable</label>
                <select name="jefe" id="jefe">
                    <option value=""></option>
                    <?php
                    if ($jefes = getBosses($con)) :
                        while ($jefe = mysqli_fetch_assoc($jefes)) :
                    ?>
                    <option value="<?=$jefe['id']?>"><?=$jefe['nombre']?></option>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </select>
            </div>
            <input type="hidden" name="createseller">
            <input type="submit" value="añadir" class="form-button">
        </div>

    </form>
</main>



<?php
destroySession('errors');
destroySession('db');
require_once('common/footer.php');
?>