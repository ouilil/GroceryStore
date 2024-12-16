<?php
session_start();
include 'config.php';

// Ініціалізація лічильника спроб
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Обмеження кількості спроб входу
    if ($_SESSION['login_attempts'] >= 5) {
        die("Ви перевищили кількість спроб входу. Спробуйте через 5 хвилин.");
    }

    // Санітарна очистка
    $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    $password = $_POST['password'];

    // CSRF-перевірка
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF токен недійсний.");
    }

    // Перевірка користувача
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['login_attempts'] = 0; // Скидаємо лічильник спроб
        header("Location: index.php");
        exit();
    } else {
        $message = "Неправильне ім'я користувача або пароль";
        $_SESSION['login_attempts']++;
    }
}

// Генерація CSRF токена
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Авторизація</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Авторизація</h1>

        <?php if (isset($message)): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>

        <form action="login.php" method="post">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
            <div class="mb-3">
                <label>Ім'я користувача:</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Пароль:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Увійти</button>
            <p>Ще не зареєстровані? <a href="register.php">Зареєструватися</a></p>
        </form>
    </div>
</body>
</html>
