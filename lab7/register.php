<?php
session_start();

// Підключення до SQLite бази даних
try {
    $conn = new PDO('sqlite:' . __DIR__ . '/database.sqlite');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Перевірка на унікальність email
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['email' => $email]);

        if ($stmt->fetch()) {
            echo "Електронна пошта вже використовується.";
        } else {
            // Збереження нового користувача
            $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                'username' => $username,
                'email' => $email,
                'password' => $password
            ]);
            echo "success";
        }
    }
} catch (PDOException $e) {
    echo "Помилка підключення: " . $e->getMessage();
}
?>
