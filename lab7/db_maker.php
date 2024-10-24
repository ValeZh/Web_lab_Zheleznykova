<?php
try {
    $conn = new PDO('sqlite:' . __DIR__ . '/database.sqlite');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Створення таблиці users, якщо її ще не існує
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT NOT NULL,
        email TEXT NOT NULL UNIQUE,
        password TEXT NOT NULL
    )";
    
    // Виконання SQL-запиту
    $conn->exec($sql);

    echo "Таблиця успішно створена або вже існує.";
} catch (PDOException $e) {
    echo "Помилка створення таблиці: " . $e->getMessage();
}
?>
