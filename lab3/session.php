<?php
session_start();

// Ініціалізація користувача
$valid_login = "admin";
$valid_password = "password123";

// Вхід
if (isset($_POST['login']) && isset($_POST['password'])) {
    if ($_POST['login'] === $valid_login && $_POST['password'] === $valid_password) {
        $_SESSION['user'] = $_POST['login'];
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "Неправильний логін або пароль!";
    }
}

// Вихід
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Сторінка входу</title>
</head>
<body>
    <?php if (isset($_SESSION['user'])): ?>
        <p>Привіт, <?php echo htmlspecialchars($_SESSION['user']); ?>!</p>
        <form method="POST" action="">
            <button type="submit" name="logout">Вийти</button>
        </form>
    <?php else: ?>
        <form method="POST" action="">
            <label>Логін:</label>
            <input type="text" name="login" required>
            <br>
            <label>Пароль:</label>
            <input type="password" name="password" required>
            <br>
            <button type="submit">Увійти</button>
        </form>
    <?php endif; ?>
</body>
</html>
