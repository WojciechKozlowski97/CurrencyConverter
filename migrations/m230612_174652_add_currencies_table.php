<?php

require_once '../src/Database/DbConnection.php';

$db = new DbConnection();
$pdo = $db->getConn();

$sql = "
CREATE TABLE currencies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    currency VARCHAR(255) NULL,
    code VARCHAR(10) NULL,
    mid DECIMAL(16, 4) NULL
)";

try {
    $pdo->exec($sql);
    echo "Table 'currencies' successfully created!";
} catch (Exception $e) {
    echo $e->getMessage();
}
