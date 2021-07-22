<?php
require_once('common/nav.php');
?>
<main class="car-grid">
    <?php
    if ($sellers = getSellers($con)) :
        while ($seller = mysqli_fetch_assoc($sellers)) :
    ?>
            <a href="#">
                <div class="card">
                    <img class="image-seller" src="assets/images/seller_default.png" alt="seller">
                    <div>
                        <div class="nombre-seller"><?= $seller['nombre'] . ' ' . $seller['apellidos'] . ' | ' . $seller['cargo']?> </div>
                        <div><?= $seller['email']?></div>
                        <div><span>Grupo:</span> <?= $seller['grupo']?></div>
                        <div><span>Responsable:</span> <?= $seller['jefe']?></div>
                        <div><span>Antiguedad:</span> <?= $seller['antiguedad']?></div>
                        <div><span>Salario:</span> <?= $seller['sueldo']?>€/año</div>
                        <div><span>Comisiones:</span> <?= $seller['comision']?>%</div>
                    </div>
                    <!-- <div class="stock"><?= $car['stock'] ?></div> -->
                </div>
            </a>

    <?php
        endwhile;
    endif;

    ?>
    <a href="create_seller.php" class="add-button">+</a>
</main>



<?php
require_once('common/footer.php');
?>