<?php
header('Content-Type: application/json');

try {
    $pdo = new PDO('sqlite:orders.db');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT Description FROM cities");
    $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($cities);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
