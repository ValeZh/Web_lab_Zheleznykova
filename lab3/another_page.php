<?php
session_start();

// Додати товар до сесії
if (isset($_POST['add_to_cart'])) {
    $_SESSION['cart'][] = $_POST['product'];
}

// Зберегти попередні покупки в cookie
if (!empty($_SESSION['cart'])) {
    setcookie('previous_cart', serialize($_SESSION['cart']), time() + (7 * 24 * 60 * 60));
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Корзина покупок</title>
</head>
<body>
    <form method="POST" action="">
        <label>Товар:</label>
        <input type="text" name="product" required>
        <button type="submit" name="add_to_cart">Додати до корзини</button>
    </form>

    <h2>Корзина:</h2>
    <ul>
        <?php if (!empty($_SESSION['cart'])): ?>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <li><?php echo htmlspecialchars($item); ?></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Корзина порожня.</li>
        <?php endif; ?>
    </ul>

    <h2>Попередні покупки:</h2>
    <ul>
        <?php if (isset($_COOKIE['previous_cart'])): ?>
            <?php foreach (unserialize($_COOKIE['previous_cart']) as $item): ?>
                <li><?php echo htmlspecialchars($item); ?></li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Немає попередніх покупок.</li>
        <?php endif; ?>
    </ul>
</body>
</html>
