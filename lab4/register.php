<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $database = new SQLite3('users_db.sqlite');

    // Отримання даних з форми
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Хешування пароля перед збереженням
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Підготовлений запит для додавання користувача
    $stmt = $database->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $stmt->bindValue(':username', $username, SQLITE3_TEXT);
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $stmt->bindValue(':password', $hashedPassword, SQLITE3_TEXT);

    // Виконання запиту
    if ($stmt->execute()) {
        echo "Реєстрація пройшла успішно!";
    } else {
        echo "Помилка при реєстрації користувача!";
    }
}
?>

<!-- Форма реєстрації -->
<form method="POST" action="register.php">
    <input type="text" name="username" placeholder="Ім'я користувача" required><br>
    <input type="email" name="email" placeholder="Електронна пошта" required><br>
    <input type="password" name="password" placeholder="Пароль" required><br>
    <button type="submit">Зареєструватися</button>
</form>