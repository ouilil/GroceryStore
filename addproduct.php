<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $expiration_date = $_POST['expiration_date'];

    $stmt = $conn->prepare("INSERT INTO products (product_name, product_price, product_category, stock_quantity, expiration_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sdsis", $name, $price, $category, $quantity, $expiration_date);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Додати товар</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">На головну</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Додати новий товар</h1>
        <form action="addproduct.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Назва:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Ціна:</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Категорія:</label>
                <input type="text" class="form-control" id="category" name="category">
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Кількість:</label>
                <input type="text" class="form-control" id="quantity" name="quantity">
            </div>
            <div class="mb-3">
                <label for="expiration_date" class="form-label">Дата окончания срока:</label>
                <input type="date" class="form-control" id="expiration_date" name="expiration_date">
            </div>
            <button type="submit" class="btn btn-success">Додати</button>
            <a href="index.php" class="btn btn-secondary">Назад</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
