<?php
require_once('common/nav.php');
?>
<main class="customers-grid">
   <div class="buttonCustomers" id="buttonCustomers">Ver mis clientes</div>
    <div class="allCustomers">
        <div class="horizontal-card">
            <div class="nombre">ID</div>
            <div class="nombre">Nombre</div>
            <div>Ciudad</div>
            <div>Fecha alta</div>
            <div>Vendedor</div>
            <!-- <div class="stock"><?= $car['stock'] ?></div> -->
        </div>
        <?php
        if ($customers = getCustomers($con)) :
            while ($customer = mysqli_fetch_assoc($customers)) :
        ?>
            <div class="horizontal-card">
                <div><?= $customer['id'] ?> </div>
                <div class="nombre"><?= $customer['nombre'] ?> </div>
                <div><?= $customer['ciudad'] ?></div>
                <div><?= $customer['fecha_alta'] ?></div>
                <div><?= $customer['vendedor'] ?></div>
                <!-- <div class="stock"><?= $car['stock'] ?></div> -->
            </div>
        <?php
            endwhile;
        endif;
        ?>
    </div>
    <div class="sellerCustomers">
        <div class="horizontal-card">
            <div class="nombre">ID</div>
            <div class="nombre">Nombre</div>
            <div>Ciudad</div>
            <div>Fecha alta</div>
            <div>Vendedor</div>
            <!-- <div class="stock"><?= $car['stock'] ?></div> -->
        </div>
        <?php
        if ($customers = getCustomers($con)) :
            while ($customer = mysqli_fetch_assoc($customers)) :
        ?>
            <div class="horizontal-card">
                <div><?= $customer['id'] ?> </div>
                <div class="nombre"><?= $customer['nombre'] ?> </div>
                <div><?= $customer['ciudad'] ?></div>
                <div><?= $customer['fecha_alta'] ?></div>
                <div><?= $customer['vendedor'] ?></div>
                <!-- <div class="stock"><?= $car['stock'] ?></div> -->
            </div>
        <?php
            endwhile;
        endif;
        ?>
    </div>
    
    <a href="create_customer.php" class="add-button">+</a>
</main>



<?php
require_once('common/footer.php');
?>