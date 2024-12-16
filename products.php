<?php
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
    <title>Список товарів</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">На головну</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Продукти</h1>

        <a href="addproduct.php" class="btn btn-success mb-3">Додати новий товар</a>

        <form method="get" action="products.php" class="mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="only_in_stock" id="onlyInStock" <?php if ($only_in_stock) echo 'checked'; ?>>
                <label class="form-check-label" for="onlyInStock">Лише товари в наявності</label>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Застосувати фільтр</button>
        </form>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Назва</th>
                        <th>Ціна</th>
                        <th>Категорія</th>
                        <th>Кількість на складі</th>
                        <th>Дата окончания срока</th>
                        <th>Дії</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                                <td><?php echo htmlspecialchars(number_format($row['product_price'], 2)); ?> ₴</td>
                                <td><?php echo htmlspecialchars($row['product_category']); ?></td>
                                <td><?php echo htmlspecialchars($row['stock_quantity']); ?></td>
                                <td><?php echo htmlspecialchars($row['expiration_date'] ?: 'Не задано'); ?></td>
                                <td>
                                    <a href="editproduct.php?id=<?php echo $row['product_id']; ?>" class="btn btn-warning btn-sm">Редагувати</a>
                                    <a href="deleteproduct.php?id=<?php echo $row['product_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Ви впевнені, що хочете видалити цей товар?');">Видалити</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">Товари не знайдені.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
