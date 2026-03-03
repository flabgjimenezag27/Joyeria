<?php include('../includes/adminHeader.php');
require_once('../includes/config.php');
require_once('../model/ordersDB.php');
require_once('customerController.php');

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
             <h4>ORDEN NUMERO: <?php echo $order['orderNo'] ?></h4>
			 <p>
			 <label>Estado de la orden</label>
			 <select name="orderStatus">
					<?php foreach ( $status as $row ) : ?>
					<option value="<?php echo $row['status']; ?>" <?php if($order['orderStatus'] == $row['status']) echo 'selected' ; ?> >
						<?php echo $row['status']; ?>
					</option>
					<?php endforeach; ?>
				</select>
				<br>
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
				
					
				<label>Direccion de Envio</label>
					<input class="form-control" type="text" name="shipAddress" value="<?php echo $order['shipAddress']; ?>">
				
					
					
				<br>
				<input class="form-control"  type="text" name="shipCity" value="<?php echo $order['shipCity']; ?>" class="form-control"><br>
				<input class="form-control" type="text" name="shipZipcode" value="<?php echo $order['shipZipcode']; ?>"><br>
				<select name="shipState" class="form-control">
					<?php foreach ( $shipstates as $state ) : ?>
					<option value="<?php echo $state['stateCode'];?>" <?php if($state['stateCode'] == $order[ 'shipState']) echo 'selected' ; ?> >
						<?php echo $state['stateName']; ?>
					</option>
					<?php endforeach; ?>
				</select>
				<br>
				<label>Direccion de Facturación</label>
				<input  class="form-control" type="text" name="billAdress" value="<?php echo $order['billAdress']; ?>"><br>
				<input  class="form-control" type="text" name="billCity" value="<?php echo $order['billCity']; ?>"><br>
				<input  class="form-control" type="text" name="billZipcode" value="<?php echo $order['billZipcode']; ?>"><br>
				<select name="billState"  class="form-control">
					<?php foreach ( $billstates as $state ) : ?>
					<option value="<?php echo $state['stateCode'];?>" <?php if($state['stateCode'] == $order['billState']) echo 'selected' ; ?> >
						<?php echo $state['stateName']; ?>
					</option>
					<?php endforeach; ?>
				</select>
				</div>
				
				<h3 class="mt-5 text-uppercase"><strong>Detalles de Pago</strong></h3>
				<div id="paymentInfo">
				<label><strong>Nombre de Tarjeta</strong></label>
				<input  class="form-control" type="text" name="cardName" value="<?php echo $order['cardName']; ?>"><br>
                <label><strong>Numero de Tarjeta</strong></label>
				<input  class="form-control" type="text" name="cardNumber" value="<?php echo $order['cardNumber']; ?>"><br>
				<label><strong>Expiracion</strong></label>
				<input  class="form-control" type="text" name="cardExpiration" value="<?php echo $order['cardExpiration']; ?>"><br>
				<label><strong>CVV</strong></label>
				<input class="form-control" type="text" name="cardCVV" value="<?php echo $order['cardCVV']; ?>"><br>
				
				</div>


				
				<div class="text-right mb-4">
				<input type="submit" value="Delete" onclick="return confirm('Are you sure?')" name="deleteOrder" class="btn btn-danger">
				<input type="submit" value="Update" name="updateOrder" class="btn btn-primary">
					
		</div>


			</form>
		</div>
	

<?php include('../includes/adminFooter.php'); ?>