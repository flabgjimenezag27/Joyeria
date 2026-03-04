<?php
require_once('../includes/config.php');
require_once(ROOT_PATH . 'core/init.php');
include(ROOT_PATH .'includes/header.php');
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['placeOrder'])){

    $orderNo = mt_rand();
    $customerId = $_SESSION['customerID'];

    $cardName = trim($_POST['cardName']);
    $cardNumber = trim($_POST['cardNumber']);
    $cardExpiration = trim($_POST['cardExpiration']);
    $cardCVV = trim($_POST['cardCVV']);

    $shipAddress = trim($_POST['shipAddress']);
    $shipCity = trim($_POST['shipCity']);
    $shipZipcode = trim($_POST['shipZipcode']);
    $shipState = $_POST['shipState'];

    $billAdress = trim($_POST['billAddress']);
    $billCity = trim($_POST['billCity']);
    $billState = $_POST['billState'];
    $billZipcode = trim($_POST['billZipcode']);

    // =========================
    // VALIDACIONES NUMÉRICAS
    // =========================

    if (!ctype_digit($shipZipcode) || intval($shipZipcode) <= 0) {
        die("Error: Código postal de envío inválido.");
    }

    if (!ctype_digit($billZipcode) || intval($billZipcode) <= 0) {
        die("Error: Código postal de facturación inválido.");
    }

    if (!preg_match("/^[a-zA-Z\s]+$/", $cardName)) {
    die("Error: El nombre en la tarjeta solo debe contener letras.");
    }

    if (!ctype_digit($cardNumber) || intval($cardNumber) <= 0) {
        die("Error: Número de tarjeta inválido.");
    }

    if (!preg_match('/^(0[1-9]|1[0-2])\/[0-9]{2}$/', $cardExpiration)) {
    die("Error: Fecha de expiración inválida. Use formato MM/YY.");
    }

    if (!preg_match('/^[0-9]{3,4}$/', $cardCVV)) {
    die("Error: CVV inválido. Debe tener 3 o 4 dígitos.");
  }

    // Si todo está correcto
    include(ROOT_PATH . 'checkout/cartController.php');
    $totalPrice = get_subtotal();

    include(ROOT_PATH . 'orders/ordersController.php');
    unset($_SESSION['cart']);
}
?>


<main>
<div>
<p></p>
<h1>Thank you for your Order!</h1>
<p><h3>Your Order Number is :  <?php echo $orderNo; ?></h3></p>
<p>You will receive an email confirming your order.</p>
<div>
  <a href="/TermProject/">Shop Again</a>
</div>

</div>

</main>


<?php include(ROOT_PATH .'includes/footer.php'); ?>