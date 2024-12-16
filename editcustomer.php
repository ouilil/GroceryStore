<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM customers WHERE customer_id = $id";
    $result = $conn->query($query);
    $customer = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $contact_info = $_POST['contact_info'];
    $purchase_history = $_POST['purchase_history'];
    $contract_number = $_POST['contract_number'];

    $query = "UPDATE customers SET customer_name = '$name', contact_info = '$contact_info', purchase_history = '$purchase_history', contract_number = '$contract_number' WHERE customer_id = $id";
    $conn->query($query);
    header("Location: customers.php");
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редагувати клієнта</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="customers.php">Назад до списку клієнтів</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Редагувати клієнта</h1>
        <form action="editcustomer.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($customer['customer_id']); ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Ім'я:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($customer['customer_name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="contact_info" class="form-label">Контактна інформація:</label>
                <input type="text" class="form-control" id="contact_info" name="contact_info" value="<?php echo htmlspecialchars($customer['contact_info']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="purchase_history" class="form-label">Історія покупок:</label>
                <textarea class="form-control" id="purchase_history" name="purchase_history"><?php echo htmlspecialchars($customer['purchase_history']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="contract_number" class="form-label">Номер контракту:</label>
                <input type="text" class="form-control" id="contract_number" name="contract_number" value="<?php echo htmlspecialchars($customer['contract_number']); ?>">
            </div>
            <button type="submit" class="btn btn-success">Зберегти</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
