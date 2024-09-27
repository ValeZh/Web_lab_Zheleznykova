<?php
$logFile = 'log.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['text'])) {
    $text = htmlspecialchars($_POST['text']) . PHP_EOL;
    
    // Записуємо новий текст у файл, попередньо очищаючи його вміст
    file_put_contents($logFile, $text);
    
    echo "Текст успішно записано в файл.<br>";
}

// Читання з файлу
if (file_exists($logFile)) {
    echo "<h3>Зміст файлу:</h3>";
    echo nl2br(file_get_contents($logFile));
} else {
    echo "Файл log.txt ще не створений.";
}
?>