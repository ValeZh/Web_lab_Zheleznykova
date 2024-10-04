<?php
// Підключення до бази даних SQLite
$database = new SQLite3('users_db.sqlite');

// Створення таблиці користувачів, якщо вона ще не існує
$query = "CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL
)";
$database->exec($query);

echo "База даних і таблиця користувачів успішно створені!";
?>
