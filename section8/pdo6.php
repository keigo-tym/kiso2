<?php
$dsn = "sqlite:eldb.sqlite3";
$pdo = new PDO($dsn);

$sql = "select id, title from categories";
$st = $pdo->query($sql);

$row = $st->fetch(PDO::FETCH_NUM);
var_dump($row);
