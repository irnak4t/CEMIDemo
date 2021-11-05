<?php

$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_MULTI_STATEMENTS => false,
    PDO::ATTR_EMULATE_PREPARES => false,
];

return new PDO('mysql:host=db;dbname=test_db;charset=utf8mb4;port=3306', 'root', 'password', $opt);

