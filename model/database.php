<?php
    $dsn = 'mysql:host=localhost;dbname=jewelrydb';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include(__DIR__ . '/../errors/database_error.php');
        exit();
    }
?>