<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: register.php");
    exit();
}
include 'config.php';

$only_in_stock = isset($_GET['only_in_stock']) && $_GET['only_in_stock'] == 'on';

$query = "SELECT product_id, product_name, product_price, product_category, stock_quantity, expiration_date FROM products";
if ($only_in_stock) {
    $query .= " WHERE stock_quantity > 0";
}
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Головна сторінка</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-weight: bold;
        }
        .nav-link.active {
            font-weight: bold;
            color: #0d6efd !important;
        }
        .logout-btn {
            color: #dc3545;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">GroceryStore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Переключатель навигации">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Список товарів</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customers.php">Список клієнтів</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="suppliers.php">Список постачальників</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="supply_orders.php">Замовлення на постачання</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transactions.php">Транзакції</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link logout-btn" href="logout.php">Вийти</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Ласкаво просимо, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
