<?php
require_once( '../includes/config.php' );
require_once( ROOT_PATH . 'core/init.php' );
include( ROOT_PATH . 'includes/header.php' );
?>
<main>
	<?php
	require_once( '../core/init.php' );
	session_start();

	$_SESSION['selectedProductID'] = $_GET['id'];
	$id = $_POST[ 'id' ];
	$id = ( int )$id;
	$result = $db->query( "SELECT * FROM products WHERE productID = '$id'" );
	$product = mysqli_fetch_assoc( $result );
	$productID = $product[ 'productID' ];
	?>
	<!-- display product image on left   -->
	<form action="../checkout/cart_view.php" method="post">
		<input type="hidden" name="action" value="add">




		<div class="modal fade details-1" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
						<h4 class="modal-title" id="myModalLabel">
							<?php echo $product['title']; ?>
						</h4>
					</div>


					<div class="modal-body">
						
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-6">
									<div class="center-block">
										<img class="details img-fluid" src="<?php echo BASEURL . $product['imgPath']; ?>" alt="<?php echo $product['title']; ?>" id="detailsImage">
									</div>
								</div>

								<div class="col-sm-6">
									<h4>Detalles</h4>
									<p>
										<?php echo nl2br($product['productDescription']); ?>
									</p>
									<hr>
									<p>Price: $
										<?php echo $product['price']; ?>
									</p>
									<hr>


									<div class="row">
										<div class="col-sm-3">
											<div class="form-group">
												<label for="quantity">Cantidad:</label>
												<input type="text" class="form-control" id="quantity" name="quantity" placeholder="Ingrese cantidad">
												<small class="form-text text-danger" id="quantityError" style="display:none;"></small>
											</div>
										</div>

										<div class="col-sm-9">
											<div class="form-group">
												<label for="color">Color:</label>
												<select name="size" class="form-control" id="size">
													<option value=""></option>
													<option value="Rose Gold">Oro</option>
													<option value="Silver">Plata</option>

												</select>
											</div>
										</div>

									</div>
									<div id="alertContainer"></div>

								</div>
							</div>
						</div>
						<!-- /.container-fluid -->
					</div>
					<!-- /.modal-body -->

					<div class="modal-footer">
						<button type="button" class="btn btn-default" onclick="closeModal()">Cerrar</button>
						<button type="button" class="btn btn-warning" onclick="validateAndAddToCart(event)"><span class="glyphicon glyphicon-shopping-cart"></span> Añadir al Carrito</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Show product image  -->
		<div class="left">
			<img class="thumbnailImage" src="<?php echo BASEURL . $product['imgPath']; ?>" alt="<?php echo $product['title']; ?>">
		</div>

		<div class="right">
			<p>
				<?php echo $product['title']; ?>
			</p>
			<p>
				<?php echo $product['productDescription']; ?>
			</p>
			<p class="list-price">Precio:
   				 <s id="old-price">
        			<?php echo $product['listPrice']; ?>
    			</s>
			</p>
			<p class="price">Nuestro Precio:
				<?php echo $product['price']; ?>
			</p>

			<div class="col-sm-3">
				<div class="form-group">
					<label for="quantity">Cantidad:</label>
					<input type="number" class="form-control" id="quantity" name="quantity" min="0">
				</div>
			</div>

			<div class="col-sm-9">
				<div class="form-group">
					<label for="color">Color:</label>
					<select name="size" class="form-control" id="size">
						<option value=""></option>
						<option value="Rose Gold">Oro</option>
						<option value="Silver">Plata</option>

					</select>
				</div>
			</div>


			<button type="button" class="btn btn-details" data-toggle="modal" data-target="#productModal">Detalles</button>
		</div>
	</form>

</main>

<script>
	function closeModal() {
		jQuery('#details-modal').modal('hide');
		setTimeout(function(){
			jQuery('#details-modal').remove();
			jQuery('.modal-backdrop').remove();
		},500);
	}

	// Validación de cantidad en campo de texto (solo números)
	document.addEventListener('DOMContentLoaded', function() {
		const quantityInput = document.getElementById('quantity');
		
		if (quantityInput) {
			// Permitir solo números en tiempo real
			quantityInput.addEventListener('input', function(e) {
				this.value = this.value.replace(/[^0-9]/g, '');
			});
		}
	});

	function validateAndAddToCart(event) {
		event.preventDefault();
		
		const quantity = document.getElementById('quantity').value.trim();
		const alertContainer = document.getElementById('alertContainer');
		const quantityError = document.getElementById('quantityError');
		
		// Limpiar errores previos
		alertContainer.innerHTML = '';
		if (quantityError) quantityError.style.display = 'none';
		
		// Validaciones
		if (quantity === '') {
			showError('Por favor ingresa una cantidad', alertContainer);
			return false;
		}
		
		// Validar que sea un número entero válido
		if (!Number.isInteger(Number(quantity)) || isNaN(quantity)) {
			showError('La cantidad debe ser un número entero válido', alertContainer);
			return false;
		}
		
		const quantityNum = parseInt(quantity);
		
		if (quantityNum < 1) {
			showError('La cantidad debe ser mayor a 0', alertContainer);
			return false;
		}
		
		// Si todas las validaciones pasan, enviar el formulario
		const form = document.querySelector('form');
		const input = document.createElement('input');
		input.type = 'hidden';
		input.name = 'AddToCart';
		input.value = '1';
		form.appendChild(input);
		form.submit();
	}

	function showError(message, container) {
		const alert = document.createElement('div');
		alert.className = 'alert alert-danger alert-dismissible fade show';
		alert.role = 'alert';
		alert.innerHTML = `
			<strong>¡Error!</strong> ${message}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		`;
		container.appendChild(alert);
	}
</script>


<?php include(ROOT_PATH . 'includes/footer.php'); ?>