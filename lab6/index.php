<?php
require_once 'BankAccount.php';
require_once 'SavingsAccount.php';

try {
    // Створення об'єктів банківських рахунків
    $account1 = new BankAccount("USD", 1000);
    $savingsAccount = new SavingsAccount("USD", 5000);

    // Поповнення рахунку
    $account1->deposit(200);
    echo "Баланс рахунку після поповнення: " . $account1->getBalance() . "\n";

    // Зняття коштів
    $account1->withdraw(300);
    echo "Баланс рахунку після зняття: " . $account1->getBalance() . "\n";

    // Поповнення накопичувального рахунку та застосування відсоткової ставки
    $savingsAccount->deposit(1000);
    $savingsAccount->applyInterest();
    echo "Баланс накопичувального рахунку після відсотків: " . $savingsAccount->getBalance() . "\n";

    // Тестування помилкових операцій
    $account1->withdraw(2000); // Це викличе помилку "Недостатньо коштів"
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . "\n";
}

try {
    $account1->deposit(-500); // Це викличе помилку для некоректної суми поповнення
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . "\n";
}
?>
