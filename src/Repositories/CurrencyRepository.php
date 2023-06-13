<?php

class CurrencyRepository
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function saveCurrency($currency, $code, $mid): void
    {
        $stmt = $this->conn->prepare("INSERT INTO currencies (currency, code, mid) VALUES (:currency, :code, :mid)");
        $stmt->bindParam(':currency', $currency);
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':mid', $mid);
        $stmt->execute();
    }

    public function updateCurrency($currency, $code, $mid): void
    {
        $stmt = $this->conn->prepare("UPDATE currencies SET currency = :currency, mid = :mid WHERE code = :code");
        $stmt->bindParam(':currency', $currency);
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':mid', $mid);
        $stmt->execute();
    }

    public function getAllCurrencies(): array
    {
        $stmt = $this->conn->prepare("SELECT * FROM currencies");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCurrency(string $code): ?array
    {
        $stmt = $this->conn->prepare("SELECT * FROM currencies WHERE code = :code");
        $stmt->bindParam(':code', $code);
        $stmt->execute();
        $currency = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($currency === false) {
            return null;
        }

        return $currency;
    }
}