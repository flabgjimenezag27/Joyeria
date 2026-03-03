<?php
require_once(ROOT_PATH .'model/database.php');
require_once(ROOT_PATH .'model/accountsDB.php');
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['register'])) {

	// Captura y sanitiza los datos
	$firstName = trim($_POST['firstName']);
	$lastName  = trim($_POST['lastName']);
	$email     = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	$phone     = trim($_POST['phone']);
	//$password  = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptación segura
	$password = $_POST['password']; // ← texto plano (NO recomendado para producción)

	$address   = trim($_POST['address']);
	$city      = trim($_POST['city']);
	$state     = trim($_POST['state']);
	$zipcode   = trim($_POST['zipcode']);

	// Valida que el email no exista (opcional, si quieres)
	// Aquí podrías hacer un SELECT antes de insertar

	// Construye el array de datos
	$data = [
		'firstName' => $firstName,
		'lastName'  => $lastName,
		'email'     => $email,
		'phone'     => $phone,
		'password'  => $password,
		'address'   => $address,
		'city'      => $city,
		'state'     => $state,
		'zipcode'   => $zipcode
	];

	// Llama a la función del modelo
	registerUser($data);

	// Redirige al login
	header("Location: " . BASEURL);

	exit();
}

session_start();


if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])){

	$useremail = filter_input(INPUT_POST, 'useremail', FILTER_VALIDATE_EMAIL);
	$userpassword = filter_input(INPUT_POST, 'userpassword');

	$user = checkUser($useremail, $userpassword);
	if($user){
		$_SESSION['customerID'] = (int)$user['customerID'];
		header("Location:home.php?user=".$user['firstName']);
		exit();

	}else{
		echo "invalid login attempt";
	}

}


?>