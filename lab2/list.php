<?php
$uploadDir = 'uploads/';

if (is_dir($uploadDir)) {
    $files = scandir($uploadDir);
    echo "<h3>Список файлів:</h3>";
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            echo "<a href='" . $uploadDir . $file . "' download>$file</a><br>";
        }
    }
} else {
    echo "Каталог не знайдено.";
}
?>
