<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: another_page.php"); // Автоматичне перенаправлення
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Інформація про сервер</title>
</head>
<body>
    <p>IP-адреса клієнта: <?php echo $_SERVER['REMOTE_ADDR']; ?></p>
    <p>Браузер: <?php echo $_SERVER['HTTP_USER_AGENT']; ?></p>
    <p>Назва скрипта: <?php echo $_SERVER['PHP_SELF']; ?></p>
    <p>Метод запиту: <?php echo $_SERVER['REQUEST_METHOD']; ?></p>
    <p>Шлях до файлу на сервері: <?php echo __FILE__; ?></p>
</body>
</html>
