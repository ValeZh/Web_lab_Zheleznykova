CREATE DATABASE IF NOT EXISTS shop;
USE shop;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL CHECK (price >= 0),
    description TEXT
);

INSERT INTO products (name, price, description) VALUES
('Ноутбук', 25000, 'Сучасний ноутбук для роботи та розваг'),
('Мишка', 500, 'Бездротова мишка'),
('Смартфон', 15000, 'Смартфон з екраном 6 дюймів');
