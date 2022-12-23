<?php
$dsn = "sqlite:eldb.sqlite3";
$pdo = new PDO($dsn);

$sql = "insert into courses (id, title, learning_time, category_id) values (6, 'PHP Framework', 50, 1)";
$count = $pdo->exec($sql);
echo "Count: $count" . PHP_EOL;