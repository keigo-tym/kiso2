<?php
$dsn = "sqlite:eldb.sqlite3";
$pdo = new PDO($dsn);

$sql = "insert into categories (id, title) values (4, 'Photo')";
$count = $pdo->exec($sql);
echo "Count: $count" . PHP_EOL;