<?php
require_once 'Product.php';

class DiscountedProduct extends Product {
    public $discount;

    public function __construct($name, $price, $description, $discount) {
        parent::__construct($name, $price, $description);
        $this->discount = $discount;
    }

    // Метод для розрахунку ціни зі знижкою
    public function getDiscountedPrice() {
        return $this->price * (1 - $this->discount / 100);
    }

    // Перевизначений метод для виведення інформації про товар зі знижкою
    public function getInfo() {
        $discountedPrice = $this->getDiscountedPrice();
        return "Назва: {$this->name}\nЦіна без знижки: {$this->price}\nЗнижка: {$this->discount}%\nЦіна зі знижкою: {$discountedPrice}\nОпис: {$this->description}\n";
    }
}
?>
