<?php
require_once('common/nav.php');
?>
<main class="car-grid">
    <?php
    if ($cars = getCars($con)) :
        while ($car = mysqli_fetch_assoc($cars)) :
    ?>
            <a href="edit_car.php?id=<?= $car['id']; ?>">
                <div class="card<?php if (!$car['activo'] || $car['stock'] <= 0) echo ' inactivo'; ?>">
                    <img src="assets/images/car_images/<?= $car['imagen'] ?>.jpg" alt="car">
                    <div>
                        <div class="marca-modelo"><?= $car['marca'] . ' ' . $car['modelo'] ?></div>
                        <div class="precio"><?= $car['precio'] ?>€</div>
                    </div>
                    <div class="stock"><?= $car['stock'] ?></div>
                </div>
            </a>

        <?php
        endwhile;
    endif;

    if (checkAdminPermissions($con, $_SESSION['userdata']['id'], 3)) :
        ?>
        <a href="create_car.php" class="add-button">+</a>
    <?php endif; ?>
</main>



<?php
require_once('common/footer.php');
?>