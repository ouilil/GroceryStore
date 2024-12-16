<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $expiration_date = $_POST['expiration_date'];

    $stmt = $conn->prepare("UPDATE products SET product_name = ?, product_price = ?, product_category = ?, stock_quantity = ?, expiration_date = ? WHERE product_id = ?");
    $stmt->bind_param("sdsisi", $name, $price, $category, $quantity, $expiration_date, $id);
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
   <title>Редагувати товар</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Назад</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Редагувати товар</h1>
        <form action="editproduct.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['product_id']); ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Назва:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($product['product_name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Ціна:</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($product['product_price']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Категорія:</label>
                <input type="text" class="form-control" id="category" name="category" value="<?php echo htmlspecialchars($product['product_category']); ?>">
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Кількість:</label>
                <input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo htmlspecialchars($product['stock_quantity']); ?>">
            </div>
            <div class="mb-3">
                <label for="expiration_date" class="form-label">Дата окончания срока:</label>
                <input type="date" class="form-control" id="expiration_date" name="expiration_date" value="<?php echo htmlspecialchars($product['expiration_date']); ?>">
            </div>
            <button type="submit" class="btn btn-success">Зберегти</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
