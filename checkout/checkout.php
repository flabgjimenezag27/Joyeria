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
<input type="text" 
       class="form-control form-control-sm" 
       name="billZipcode" 
       placeholder="Código postal..." 
       pattern="[0-9]+" 
       inputmode="numeric"
       required><br>
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

<input type="text" 
       class="form-control form-control-sm" 
       name="shipZipcode"
       id="shipZipcode"
       placeholder="Código postal..."
       required>
<small class="text-danger" id="shipZipError"></small><br>

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
     
      <input type="text" 
       class="form-control form-control-sm" 
       name="cardNumber"
       id="cardNumber"
       placeholder="card number"
       required>
      <small class="text-danger" id="cardNumberError"></small>

<input type="text" 
       class="form-control form-control-sm" 
       name="cardExpiration"
       id="cardExpiration"
       placeholder="MM/YY"
       required>

<small class="text-danger" id="expirationError"></small>
      
        <input type="text" 
       class="form-control form-control-sm" 
       name="cardCVV" 
       id="cardCVV"
       placeholder="CVV"
       required>

      <small class="text-danger" id="cvvError"></small>

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

<script>

// CVV validación
document.getElementById("cardCVV").addEventListener("input", function() {
    const value = this.value;
    const error = document.getElementById("cvvError");

    if (!/^[0-9]*$/.test(value)) {
        error.textContent = "El CVV solo debe contener números.";
    } else if (value.length > 0 && value.length !== 4) {
        error.textContent = "Debe tener 4 dígitos.";
    } else {
        error.textContent = "";
    }
});

// Código Postal validación
document.getElementById("shipZipcode").addEventListener("input", function() {
    const value = this.value;
    const error = document.getElementById("shipZipError");

    if (!/^[0-9]*$/.test(value)) {
        error.textContent = "El código postal solo debe contener números.";
    } else {
        error.textContent = "";
    }
});

// Número de tarjeta validación
document.getElementById("cardNumber").addEventListener("input", function() {
    const value = this.value;
    const error = document.getElementById("cardNumberError");

    if (!/^[0-9]*$/.test(value)) {
        error.textContent = "El número de tarjeta solo debe contener números.";
    } else if (value.length > 7 && value.length !== 8) {
        error.textContent = "Debe tener 8 o 7 dígitos.";
    } else {
        error.textContent = "";
    }
});

// Fecha MM/YY validación
document.getElementById("cardExpiration").addEventListener("input", function() {
    const value = this.value;
    const error = document.getElementById("expirationError");

    if (!/^(0[1-9]|1[0-2])\/?[0-9]{0,2}$/.test(value)) {
        error.textContent = "Formato inválido. Use MM/YY.";
    } else {
        error.textContent = "";
    }
});

</script>


<?php include(ROOT_PATH .'includes/footer.php'); ?>