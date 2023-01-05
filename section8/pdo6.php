<?php
$dsn = "sqlite:eldb.sqlite3";
$pdo = new PDO($dsn);

$sql = "select id, title from categories";
$st = $pdo->query($sql);

$row = $st->fetch();
// var_dump($row);

echo $row[0] . PHP_EOL;
echo $row[1] . PHP_EOL;