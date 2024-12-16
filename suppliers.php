<?php
include 'config.php';

$query = "SELECT supplier_id, supplier_name, contact_info, last_supply_date, cooperation_history FROM suppliers";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список постачальників</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">На головну</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Список постачальників</h1>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Назва постачальника</th>
                        <th>Контактна інформація</th>
                        <th>Дата останнього постачання</th>
                        <th>Історія співпраці</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['supplier_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['contact_info']); ?></td>
                                <td><?php echo htmlspecialchars($row['last_supply_date'] ?: 'Не задано'); ?></td>
                                <td><?php echo htmlspecialchars($row['cooperation_history']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">Постачальники не знайдені.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
