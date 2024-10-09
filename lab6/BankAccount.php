<?php
require_once 'AccountInterface.php';

class BankAccount implements AccountInterface {
    const MIN_BALANCE = 0;
    protected $balance;
    protected $currency;

    public function __construct($currency, $initialBalance = 0) {
        $this->currency = $currency;
        $this->balance = max($initialBalance, self::MIN_BALANCE); // Мінімальний баланс 0
    }

    // Метод для поповнення рахунку
    public function deposit($amount) {
        if ($amount < 0) {
            throw new Exception("Сума поповнення не може бути від'ємною.");
        }
        $this->balance += $amount;
    }

    // Метод для зняття коштів
    public function withdraw($amount) {
        if ($amount < 0) {
            throw new Exception("Сума зняття не може бути від'ємною.");
        }
        if ($amount > $this->balance) {
            throw new Exception("Недостатньо коштів.");
        }
        $this->balance -= $amount;
    }

    // Метод для отримання поточного балансу
    public function getBalance() {
        return $this->balance . ' ' . $this->currency;
    }
}
?>
