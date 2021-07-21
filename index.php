<?php
require_once('common/nav.php');
?>
<main class="car-grid">
    <?php
    if ($cars = getCars($con)) :
        while ($car = mysqli_fetch_assoc($cars)) :
    ?>
            <a href="edit_car.php?id=<?=$car['id'];?>">
                <div class="card">
                    <img src="assets/images/<?=$car['imagen']?>.jpg" alt="car">
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

    ?>
    <a href="create_car.php" class="add-button">+</a>
</main>



<?php
require_once('common/footer.php');
?>