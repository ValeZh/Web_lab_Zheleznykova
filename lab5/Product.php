<?php
class Product {
    public $name;
    public $description;
    protected $price;

    public function __construct($name, $price, $description) {
        $this->name = $name;
        $this->setPrice($price);
        $this->description = $description;
    }

    // Метод для виведення інформації про товар
    public function getInfo() {
        return "Назва: {$this->name}\nЦіна: {$this->price}\nОпис: {$this->description}\n";
    }

    // Метод для встановлення ціни з валідацією
    public function setPrice($price) {
        if ($price < 0) {
            throw new Exception("Ціна не може бути від'ємною.");
        }
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }
}
?>
