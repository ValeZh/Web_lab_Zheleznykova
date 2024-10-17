<?php
session_start();

try {
    $conn = new PDO('sqlite:' . __DIR__ . '/database.sqlite');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['email' => $email]);

        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            echo "success";
        } else {
            echo "Неправильний email або пароль.";
        }
    }
} catch (PDOException $e) {
    echo "Помилка підключення: " . $e->getMessage();
}
?>
