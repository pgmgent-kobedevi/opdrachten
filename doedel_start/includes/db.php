<?php
try {               
    $db = new PDO(DB_DSN, DB_USER, DB_PWD);
} catch (PDOException $exception) {
    die('Databaseverbinding mislukt: ' . $exception->getMessage());
}

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);