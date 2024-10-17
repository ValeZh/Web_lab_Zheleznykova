<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Особистий кабінет</title>
</head>
<body>
    <h1>Вітаємо, <?php echo $_SESSION['username']; ?>!</h1>
    <a href="logout.php">Вийти</a>
</body>
</html>