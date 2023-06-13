<?php

class DbConnection
{
    private PDO $conn;

    public function __construct()
    {
        $this->connect();
    }

    private function connect(): void
    {
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=api_nbp', 'root', 'root');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection failed: " . $exception->getMessage();
        }
    }

    public function getConn(): PDO
    {
        return $this->conn;
    }
}
