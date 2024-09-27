<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $uploadDir = 'uploads/';
    
    // Створення папки, якщо вона не існує
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $file = $_FILES['file'];
    $fileName = basename($file['name']);
    $fileSize = $file['size'];
    $fileTmp = $file['tmp_name'];
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

    // Перевірка на розширення і розмір файлу
    $allowedTypes = ['png', 'jpg', 'jpeg'];
    if (!in_array($fileType, $allowedTypes)) {
        echo "Дозволені лише зображення формату png, jpg, jpeg.";
        exit;
    }

    if ($fileSize > 2 * 1024 * 1024) { // 2 МБ
        echo "Розмір файлу не повинен перевищувати 2 МБ.";
        exit;
    }

    // Перевірка, чи існує файл з таким ім'ям
    if (file_exists($uploadDir . $fileName)) {
        $fileName = pathinfo($fileName, PATHINFO_FILENAME) . '_' . time() . '.' . $fileType;
    }

    // Завантаження файлу
    if (move_uploaded_file($fileTmp, $uploadDir . $fileName)) {
        echo "Файл успішно завантажено.<br>";
        echo "Ім'я файлу: $fileName<br>";
        echo "Тип файлу: $fileType<br>";
        echo "Розмір файлу: " . round($fileSize / 1024, 2) . " КБ<br>";
        echo "<a href='" . $uploadDir . $fileName . "'>Завантажити файл</a>";
    } else {
        echo "Помилка завантаження файлу.";
    }
} else {
    echo "Файл не вибрано або завантаження не відбулося.";
}
?>