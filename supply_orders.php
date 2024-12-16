<?php
include 'config.php';

$query = "SELECT order_id, customer_name, customer_address, customer_phone, contract_number, contract_date, product_id, planned_delivery FROM supply_orders";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список замовлень на постачання</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">На головну</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Замовлення на постачання</h1>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Код замовлення</th>
                        <th>Ім'я клієнта</th>
                        <th>Адреса клієнта</th>
                        <th>Телефон</th>
                        <th>Номер контракту</th>
                        <th>Дата контракту</th>
                        <th>ID продукту</th>
                        <th>Кількість до поставки</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['order_id']); ?></td>
                                <td><?php echo htmlspecialchars($row['customer_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['customer_address']); ?></td>
                                <td><?php echo htmlspecialchars($row['customer_phone']); ?></td>
                                <td><?php echo htmlspecialchars($row['contract_number']); ?></td>
                                <td><?php echo htmlspecialchars($row['contract_date']); ?></td>
                                <td><?php echo htmlspecialchars($row['product_id']); ?></td>
                                <td><?php echo htmlspecialchars($row['planned_delivery']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">Замовлення не знайдені.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
