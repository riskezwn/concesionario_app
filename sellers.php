<?php
require_once('common/nav.php');
?>
<main class="car-grid">
    <?php
    if ($cars = getSellers($con)) :
        while ($car = mysqli_fetch_assoc($cars)) :
    ?>
            <a href="edit_car.php?id=<?=$car['id'];?>">
                <div class="card">
                    <img src="assets/images/seller_default.png" alt="seller">
                    <div>
                        <div class="marca-modelo"><?= $car['nombre'] . ' ' . $car['apellidos'] ?></div>
                        <div><?= $car['email']?></div>
                        <div><?= $car['grupo']?></div>
                        <div><?= $car['jefe']?></div>
                        <div><?= $car['cargo']?></div>
                        <div><?= $car['fecha_alta']?></div>
                        <div><?= $car['sueldo']?></div>
                        <div><?= $car['comision']?></div>
                    </div>
                    <!-- <div class="stock"><?= $car['stock'] ?></div> -->
                </div>
            </a>

    <?php
        endwhile;
    endif;

    ?>
    <a href="create_car.php" class="add-button">+</a>
</main>



<?php
require_once('common/footer.php');
?>