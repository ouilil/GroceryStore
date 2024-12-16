<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $contact_info = $_POST['contact_info'];
    $purchase_history = $_POST['purchase_history'];
    $contract_number = $_POST['contract_number'];

    $query = "INSERT INTO customers (customer_name, contact_info, purchase_history, contract_number) VALUES ('$name', '$contact_info', '$purchase_history', '$contract_number')";
    $conn->query($query);
    header("Location: customers.php");
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Додати клієнта</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">На головну</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Додати нового клієнта</h1>
        <form action="addcustomer.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Ім'я:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="contact_info" class="form-label">Контактна інформація:</label>
                <input type="text" class="form-control" id="contact_info" name="contact_info" required>
            </div>
            <div class="mb-3">
                <label for="purchase_history" class="form-label">Історія покупок:</label>
                <textarea class="form-control" id="purchase_history" name="purchase_history"></textarea>
            </div>
            <div class="mb-3">
                <label for="contract_number" class="form-label">Номер контракту:</label>
                <input type="text" class="form-control" id="contract_number" name="contract_number">
            </div>
            <button type="submit" class="btn btn-success">Додати</button>
        </form>
        <br>
        <a href="customers.php" class="btn btn-secondary">Назад до списку клієнтів</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
