<?php
include 'config.php';

$query = "SELECT customer_id, customer_name, contact_info, purchase_history, contract_number FROM customers";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список клієнтів</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">На головну</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Список клієнтів</h1>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Ім'я</th>
                        <th>Контактна інформація</th>
                        <th>Історія покупок</th>
                        <th>Номер контракту</th>
                        <th>Дії</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['customer_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['contact_info']); ?></td>
                                <td><?php echo htmlspecialchars($row['purchase_history']); ?></td>
                                <td><?php echo htmlspecialchars($row['contract_number']); ?></td>
                                <td>
                                    <a href="editcustomer.php?id=<?php echo $row['customer_id']; ?>" class="btn btn-warning btn-sm">Редагувати</a>
                                    <a href="deletecustomer.php?id=<?php echo $row['customer_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Ви впевнені, що хочете видалити клієнта?');">Видалити</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Клієнти не знайдені.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <a href="addcustomer.php" class="btn btn-success mt-3">Додати нового клієнта</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
