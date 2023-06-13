<?php

class ResultRepository
{
    private PDO $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function saveResult(string $sourceCurrency, string $targetCurrency, float $amount, float $result): void
    {
        $stmt = $this->conn->prepare("INSERT INTO results (source_currency, target_currency, amount, result) VALUES (:sourceCurrency, :targetCurrency, :amount, :result)");
        $stmt->bindParam(':sourceCurrency', $sourceCurrency);
        $stmt->bindParam(':targetCurrency', $targetCurrency);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':result', $result);
        $stmt->execute();
    }

    public function getResults(): array
    {
        $stmt = $this->conn->prepare("SELECT * FROM results");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}