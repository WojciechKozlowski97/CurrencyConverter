<?php

require_once '../src/Database/DbConnection.php';

$db = new DbConnection();
$pdo = $db->getConn();

$sql = "
CREATE TABLE results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    source_currency VARCHAR(10) NULL,
    target_currency VARCHAR(10) NULL,
    amount DECIMAL(16, 4) NULL,
    result DECIMAL(16, 4) NULL
)";

try {
    $pdo->exec($sql);
    echo "Table 'results' successfully created!";
} catch (Exception $e) {
    echo $e->getMessage();
}
