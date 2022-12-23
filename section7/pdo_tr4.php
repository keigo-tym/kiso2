<?php
$dsn = "sqlite:eldb.sqlite3";
$pdo = new PDO($dsn);

$sql = "delete from courses where id = 6";
$count = $pdo->exec($sql);
echo "Count: $count" . PHP_EOL;