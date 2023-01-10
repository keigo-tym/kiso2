<?php
$dsn = "sqlite:eldb.sqlite3";
$pdo = new PDO($dsn);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$sql = "select id, title from categories";
$st = $pdo->query($sql);
$row = $st->fetch();
var_dump($row);