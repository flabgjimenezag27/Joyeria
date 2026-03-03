<?php
require_once('../includes/config.php');
require_once(ROOT_PATH . 'core/init.php');
include(ROOT_PATH .'includes/header.php');
include('cartController.php');
session_start(); ?>

<div class="container">
	<div class="row">

		<div class="col-md-12">
			<h4 class="mb-4 mt-4">Verificar</h4>
			<div class="table-responsive">
<form action="../orders/orderdetails.php" method="post">
 <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Direccion de Envio
        </a>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <input type="text" class="form-control form-control-sm" name="shipAddress" placeholder="Dirección..." required><br>
		<input type="text" class="form-control form-control-sm" name="shipCity"  placeholder="Ciudad..." required><br>
		<input type="text" class="form-control form-control-sm" name="shipZipcode"  placeholder="Código postal..." required><br>
        <select class="form-control form-control-sm" name="shipState" required>
  <option value="">Selecciona un departamento</option>
  <option value="SC">Santa Cruz</option>
  <option value="LP">La Paz</option>
  <option value="CB">Cochabamba</option>
  <option value="PT">Potosí</option>
  <option value="OR">Oruro</option>
  <option value="CH">Chuquisaca</option>
  <option value="TJ">Tarija</option>
  <option value="BN">Beni</option>
  <option value="PD">Pando</option>
</select>
      </div>

    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
         Direccion de Facturacion
        </a>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
      <div class="checkbox">
        <label><input type="checkbox" value="" id="checkAddress">Igual que la Direccion de Envio</label>
       </div>
       <div id="billingAddress">
      <input type="text" class="form-control form-control-sm" name="billAddress" placeholder="Dirección de facturación..." required autofocus><br>
<input type="text" class="form-control form-control-sm" name="billCity"  placeholder="Ciudad..." required autofocus><br>
<input type="text" class="form-control form-control-sm" name="billZipcode"  placeholder="Código postal..." required autofocus><br>
       <select class="form-control form-control-sm" name="billState" required>
  <option value="">Selecciona un departamento</option>
  <option value="SC">Santa Cruz</option>
  <option value="LP">La Paz</option>
  <option value="CB">Cochabamba</option>
  <option value="PT">Potosí</option>
  <option value="OR">Oruro</option>
  <option value="CH">Chuquisaca</option>
  <option value="TJ">Tarija</option>
  <option value="BN">Beni</option>
  <option value="PD">Pando</option>
</select><br>
</div>
    </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
         Opciones de Pago
        </a>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
      <input type="text" class="form-control form-control-sm" name="cardName" placeholder="name on card" required autofocus><br>
        <input type="text" class="form-control form-control-sm" name="cardNumber"  placeholder="card number" required autofocus><br>
        <input type="text" class="form-control form-control-sm" name="cardExpiration"  placeholder="MM/YY" required autofocus><br>
        <input type="text" class="form-control form-control-sm" name="cardCVV"  placeholder="CVV"required autofocus><br>

    </div>
    </div>
  </div>
</div>

             <div class="clearfix"></div>
<p></p>
    <p>
<input type="submit" class="btn btn-danger " name="placeOrder" value="Realizar Pedido" >

    </p>
</form>
                </div>
            </div>
        </div>
    </div>




<?php include(ROOT_PATH .'includes/footer.php'); ?>