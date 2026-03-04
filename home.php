<?php
$lifetime = 60 * 60 * 24 * 14;
session_set_cookie_params($lifetime, '/');
session_start();

// Mostrar mensaje de bienvenida si existe
if(isset($_SESSION['welcome'])) {
    echo '<div class="alert alert-success text-center">'
        . $_SESSION['welcome'] .
        '</div>';
    unset($_SESSION['welcome']);
}

include('includes/header.php');
include('includes/banner.php');
include('includes/intro.php');

// Create a cart array if needed
if (empty($_SESSION['cart'])) { $_SESSION['cart'] = array(); }

include('includes/footer.php');
?>