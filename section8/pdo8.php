<?php
$dsn = "sqlite:eldb.sqlite3";
$pdo = new PDO($dsn);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "select id, title from categorie";
$st = $pdo->query($sql);
var_dump($st);