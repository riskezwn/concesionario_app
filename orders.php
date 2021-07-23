<?php
require_once('common/nav.php');
?>
<main class="grid orders">
    <?php
    if ($orders = getOrders($con)) :
        while ($order = mysqli_fetch_assoc($orders)) :
    ?>
            <a href="#">
                <div class="card">
                    <div>
                        <div class="npedido">Nº de pedido: <?= $order['pedido_id'] ?> </div>
                        <div><span>Cliente:</span> <?= $order['cliente'] ?> | ID cliente: <?= $order['cliente_id'] ?></div>
                        <div><span>Vendedor:</span> <?= $order['vendedor'] ?></div>
                        <div><span>Vehículo:</span> <?= $order['coche'] ?></div>
                        <div><span>Cantidad:</span> <?= $order['cantidad'] ?></div>
                        <div><span>Importe total:</span> <?= $order['importe_total'] ?>€</div>
                        <div><span>Fecha pedido:</span> <?= $order['fecha'] ?></div>
                    </div>
                </div>
            </a>

    <?php
        endwhile;
    endif;
    ?>
    <a href="create_order.php" class="add-button">+</a>

</main>



<?php
require_once('common/footer.php');
?>