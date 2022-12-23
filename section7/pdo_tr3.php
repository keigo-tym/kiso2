<?php
$dsn = "sqlite:eldb.sqlite3";
$pdo = new PDO($dsn);

$sql = "update courses set title = 'Laravel', learning_time = 60 where id = 6";
$count = $pdo->exec($sql);
echo "Count: $count" . PHP_EOL;