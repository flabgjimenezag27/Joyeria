<?php


function checkUser($useremail, $userpassword){
	global $db;
    $query = 'SELECT * FROM customers WHERE
	email = :useremail and password = :userpassword';
    $statement = $db->prepare($query);
	$statement->bindValue(':useremail', $useremail);
	$statement->bindValue(':userpassword', $userpassword);
    $statement->execute();
    $user = $statement->fetch();
    return $user;
}

function getAllOrdersByCustomerID($customerID){
	global $db;
	$query = 'SELECT o.id, o.orderNo, o.orderDate, SUM(od.price) as total, o.orderStatus, CONCAT(o.shipAddress,",", o.shipCity,",", o.shipZipcode,"-", o.shipState) AS ShippingAddress, CONCAT(o.billAdress,",", o.billCity,",",o.billZipcode,"-", o.billState) AS BillingAddress FROM orders as o join orderdetails as od on o.id = od.orderID where o.customerId = :customerID
	group by o.orderNo';
	$statement = $db->prepare($query);
	$statement->bindValue(':customerID', (int)$customerID);
	$statement-> execute();
	$orders = $statement -> fetchAll();
    $statement->closeCursor();
    return $orders;
}
function registerUser($data) {
	global $db;
	$query = "INSERT INTO customers (firstName, lastName, email, phone, password, address, city, state, zipcode, isActive, isAdmin)
	          VALUES (:firstName, :lastName, :email, :phone, :password, :address, :city, :state, :zipcode, 1, 0)";
	$statement = $db->prepare($query);
	$statement->bindValue(':firstName', $data['firstName']);
	$statement->bindValue(':lastName', $data['lastName']);
	$statement->bindValue(':email', $data['email']);
	$statement->bindValue(':phone', $data['phone']);
	$statement->bindValue(':password', $data['password']); // Ya debe venir encriptada
	$statement->bindValue(':address', $data['address']);
	$statement->bindValue(':city', $data['city']);
	$statement->bindValue(':state', $data['state']);
	$statement->bindValue(':zipcode', $data['zipcode']);
	$statement->execute();
	$statement->closeCursor();
}







?>