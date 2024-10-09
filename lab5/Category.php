<?php
class Category {
    public $categoryName;
    private $products = [];

    public function __construct($categoryName) {
        $this->categoryName = $categoryName;
    }

    // Метод для додавання товару до категорії
    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    // Метод для виведення всіх товарів у категорії
    public function getProducts() {
        echo "Категорія: {$this->categoryName}\n";
        foreach ($this->products as $product) {
            echo $product->getInfo() . "\n";
        }
    }
}
?>
