<?php
$dsn = 'mysql:dbname=message-center;host=127.0.0.1;port=3307';
$user = 'root';
$password = '';

$db = new PDO($dsn, $user, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
?>