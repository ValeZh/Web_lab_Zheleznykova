<?php
try {
    $pdo = new PDO('sqlite:orders.db');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Створення таблиці, якщо її не існує
    $pdo->exec("CREATE TABLE IF NOT EXISTS cities (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        Description TEXT NOT NULL
    )");

    // Очистка таблиці перед оновленням
    $pdo->exec("DELETE FROM cities");

    $apiKey = '86be7f7cc28adf77bb1b7c099082bba3';
    $apiUrl = "https://api.novaposhta.ua/v2.0/json/";

    $data = [
        "apiKey" => $apiKey,
        "modelName" => "AddressGeneral",
        "calledMethod" => "getCities",
        "methodProperties" => [
            "SettlementType" => "563ced13-f210-11e3-8c4a-0050568002cf" // Код для міста
        ]
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'POST',
            'content' => json_encode($data)
        ]
    ];

    $context  = stream_context_create($options);
    $result = file_get_contents($apiUrl, false, $context);
    $response = json_decode($result, true);

    if ($response['success']) {
        $stmt = $pdo->prepare("INSERT INTO cities (Description) VALUES (:Description)");
        foreach ($response['data'] as $city) {
            $stmt->execute([':Description' => $city['Description']]);
        }
        echo 'Cities updated successfully!';
    } else {
        echo 'Failed to update cities.';
    }
} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
}
?>
