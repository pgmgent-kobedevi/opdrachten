<?php

CONST DB_DSN = 'mysql:dbname=arteair;host=127.0.0.1;port=3307';
CONST DB_USER = 'root';
CONST DB_PWD = '';

//open DB
$db = new PDO(DB_DSN, DB_USER, DB_PWD);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
