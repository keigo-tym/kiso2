<?php
$dsn = "sqlite:eldb.sqlite3";
$username = null;
$passwd = null;
$options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
$pdo = new PDO($dsn, $username, $passwd, $options);

$sql = "select id, title from categories";
$st = $pdo->query($sql);
$row = $st->fetch();
var_dump($row);