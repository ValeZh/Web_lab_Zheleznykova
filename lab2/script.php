<?php
// 1. Виведення тексту "Hello, World!"
echo "Hello, World!<br><br>";

// 2. Змінні та типи даних
$stringVar = "Це рядок";  // рядок
$intVar = 42;             // ціле число
$floatVar = 3.14;         // число з плаваючою комою
$boolVar = true;          // булеве значення

// Виведення змінних
echo "Рядок: " . $stringVar . "<br>";
echo "Ціле число: " . $intVar . "<br>";
echo "Число з плаваючою комою: " . $floatVar . "<br>";
echo "Булеве значення: " . ($boolVar ? "true" : "false") . "<br><br>";

// Типи даних
echo "Типи даних:<br>";
var_dump($stringVar);
echo "<br>";
var_dump($intVar);
echo "<br>";
var_dump($floatVar);
echo "<br>";
var_dump($boolVar);
echo "<br><br>";

// 3. Конкатенація рядків
$firstName = "Іван";
$lastName = "Петренко";
$fullName = $firstName . " " . $lastName;
echo "Повне ім'я: " . $fullName . "<br><br>";

// 4. Умовні конструкції (перевірка парності)
$number = 15;
if ($number % 2 == 0) {
    echo "Число $number є парним.<br><br>";
} else {
    echo "Число $number є непарним.<br><br>";
}

// 5. Цикли
// for: числа від 1 до 10
for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
}
echo "<br><br>";

// while: числа від 10 до 1
$i = 10;
while ($i >= 1) {
    echo $i . " ";
    $i--;
}
echo "<br><br>";

// 6. Масиви
$student = [
    "ім'я" => "Олександр",
    "прізвище" => "Шевченко",
    "вік" => 21,
    "спеціальність" => "Програмування"
];

echo "Інформація про студента:<br>";
echo "Ім'я: " . $student["ім'я"] . "<br>";
echo "Прізвище: " . $student["прізвище"] . "<br>";
echo "Вік: " . $student["вік"] . "<br>";
echo "Спеціальність: " . $student["спеціальність"] . "<br>";

// Додаємо середній бал
$student["середній бал"] = 4.8;
echo "<br>Оновлена інформація:<br>";
foreach ($student as $key => $value) {
    echo "$key: $value<br>";
}
?>