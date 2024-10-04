<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database = new SQLite3('users_db.sqlite');

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Підготовлений запит для пошуку користувача за ім'ям
    $stmt = $database->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindValue(':username', $username, SQLITE3_TEXT);
    $result = $stmt->execute();
    $user = $result->fetchArray(SQLITE3_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Створення сесії після успішної авторизації
        $_SESSION['username'] = $username;
        echo "Ви успішно авторизувалися!";
        header("Location: welcome.php");
        exit;
    } else {
        echo "Невірне ім'я користувача або пароль!";
    }
}
?>

<!-- Форма авторизації -->
<form method="POST" action="login.php">
    <input type="text" name="username" placeholder="Ім'я користувача" required><br>
    <input type="password" name="password" placeholder="Пароль" required><br>
    <button type="submit">Увійти</button>
</form>