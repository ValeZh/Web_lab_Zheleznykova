<?php
session_start();

// Перевірка, чи користувач авторизований
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

echo "Ласкаво просимо, " . $_SESSION['username'] . "!";
?>