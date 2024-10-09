<?php
require_once 'Product.php';
require_once 'DiscountedProduct.php';
require_once 'Category.php';

try {
    // Створення об'єктів товарів
    $product1 = new Product("Ноутбук", 25000, "Сучасний ноутбук для роботи та розваг");
    $product2 = new Product("Мишка", 500, "Бездротова мишка");
    $discountedProduct = new DiscountedProduct("Смартфон", 15000, "Смартфон з екраном 6 дюймів", 10);

    // Створення категорій
    $electronics = new Category("Електроніка");
    
    // Додавання товарів до категорії
    $electronics->addProduct($product1);
    $electronics->addProduct($product2);
    $electronics->addProduct($discountedProduct);
    
    // Виведення товарів у категорії
    $electronics->getProducts();
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage();
}
?>
