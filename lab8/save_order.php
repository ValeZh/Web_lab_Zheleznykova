<?php
try {
    $pdo = new PDO('sqlite:orders.db');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("CREATE TABLE IF NOT EXISTS orders (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        order_number TEXT NOT NULL,
        weight REAL NOT NULL,
        city TEXT NOT NULL,
        branch TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        UNIQUE(order_number)
    )");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $orderNumber = $_POST['order-number'];
        $weight = $_POST['weight'];
        $city = $_POST['city'];
        $branch = $_POST['branch'];

        $stmt = $pdo->prepare('INSERT INTO orders (order_number, weight, city, branch) VALUES (?, ?, ?, ?)');
        $stmt->execute([$orderNumber, $weight, $city, $branch]);

        echo 'Order saved successfully!';
    }
} catch (PDOException $e) {
    echo 'Failed to save order: ' . $e->getMessage();
}
?>
