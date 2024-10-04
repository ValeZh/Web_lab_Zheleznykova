<?php
$servername = "localhost";
$username = "root"; // перевірте логін, за замовчуванням "root"
$password = ""; // перевірте пароль, за замовчуванням порожній
$dbname = "users_db";

// Створення підключення
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка підключення
if ($conn->connect_error) {
    die("Підключення не вдалося: " . $conn->connect_error);
}
?>