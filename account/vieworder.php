<?php
require_once('../includes/config.php');
require_once(ROOT_PATH . 'core/init.php');
include(ROOT_PATH .'includes/header.php');
include(ROOT_PATH .'model/database.php');
include(ROOT_PATH .'model/ordersDB.php');

$orderID = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$order = getOrderByOrderID($orderID);
$details = getOrderDetailsByOrderID($orderID);
$status = getOrderStatus();
?>

<div class="fixedSpace"></div>
	<div class="container">


			<form action="customerlist.php"  method="post" class="myForm">
			<div>
			<input type="hidden" name="orderID" value="<?php echo $orderID; ?>">
             <h4>ORDER NUMERO: <?php echo $order['orderNo'] ?></h4>
			 <p>
			 <label><strong>Estado de la Orden</strong></label>
			 <span><?php echo $order['orderStatus']; ?></span>
				<br>
				<hr>
			</p>
			</div>
				<h3>Productos Ordenados</h3>
				<table id="mytable" class="table border cartTable">
				<thead>
				<th>Nombre del Producto</th>
				<th>Precio de Lista</th>
				<th>Precio</th>
				<th>Cantidad</th>
				<th>Total</th>
				</thead>
				<tbody>
				<?php foreach($details as $detail): ?>
				<tr>
				<td><?php echo $detail[0]; ?></td>
				<td>$<?php echo $detail[1]; ?></td>
				<td>$<?php echo $detail[2]; ?></td>
				<td><?php echo $detail[3]; ?></td>
				<td><?php echo ( $detail[3] * $detail[2] );  ?></td>
				</tr>
                <?php  endforeach; ?>
				</tbody>
				</table>
				<div class="clearfix"></div>
                <br><hr><br>
				<h3 class="text-uppercase"><strong>Detalles de Envio y Facturacion</strong></h3>
				<div id="shippingInfo">


				<label><strong>Dirección de Envio</strong></label>
					<p><?php echo $order['shipAddress'].' '.$order['shipCity'].' '.$order['shipZipcode'].' - '.$order['shipState']; ?> </p>



				<label><strong>Direccion de Facturacion</strong></label>
				<p><?php echo $order['billAdress'].' '.$order['billCity'].' '.$order['billZipcode'].' - '.$order['billState']; ?> </p>

				</div>
                <hr>
				<h3 class="mt-5 text-uppercase"><strong>Detalles de Pago</strong></h3>
				<div id="paymentInfo">

				<label><strong>Nombre de Tarjeta</strong></label>
				<p><?php echo $order['cardName'];?></p>
				<label><strong>Expiracion</strong></label>
				<p><?php echo $order['cardExpiration'];?></p>


              <br>
				</div>



				<div class="text-right mb-4">

				<a href="myorders.php" name="myorders" class="btn btn-primary">Mis Ordenes</a>

		</div>

			</form>
		</div>


<?php include(ROOT_PATH . 'includes/footer.php'); ?>
