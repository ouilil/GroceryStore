<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM customers WHERE customer_id = $id";
    $conn->query($query);
    header("Location: customers.php");
}
?>
