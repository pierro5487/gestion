<?php

$dsn = 'mysql:host=localhost;dbname=gestion;charset=utf8';
$pdo = new PDO($dsn, 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
