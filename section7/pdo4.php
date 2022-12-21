<?php
$dsn = "sqlite:eldb.sqlite3";
$pdo = new PDO($dsn);

$sql = "update categories set title = 'Camera' where id = 4";
$count = $pdo->exec($sql);
echo "Count: $count" . PHP_EOL;