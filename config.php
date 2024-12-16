<?php
$host = '127.0.0.1'; // або 'localhost'
$user = 'admin';
$pass = 'admintoor';
$db = 'GroceryStore';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Помилка з'єднання: " . $conn->connect_error);
}


?>
