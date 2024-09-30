<?php
session_start();

// Перевірка часу останньої активності
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 300)) {
    session_unset();
    session_destroy();
}

$_SESSION['last_activity'] = time();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Активність сесії</title>
</head>
<body>
    <p>Ваша сесія активна.</p>
</body>
</html>
