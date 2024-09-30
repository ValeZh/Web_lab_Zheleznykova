<?php
// Збереження імені в cookie
if (isset($_POST['name'])) {
    setcookie('username', $_POST['name'], time() + (7 * 24 * 60 * 60)); // 7 днів
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Видалення cookie
if (isset($_POST['delete_cookie'])) {
    setcookie('username', '', time() - 3600);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Привітання</title>
</head>
<body>
    <form method="POST" action="">
        <?php if (isset($_COOKIE['username'])): ?>
            <p>Привіт, <?php echo htmlspecialchars($_COOKIE['username']); ?>!</p>
            <button type="submit" name="delete_cookie">Видалити Cookie</button>
        <?php else: ?>
            <label>Введіть ваше ім'я:</label>
            <input type="text" name="name" required>
            <button type="submit">Зберегти</button>
        <?php endif; ?>
    </form>
</body>
</html>