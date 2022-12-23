<?php
$dsn = "sqlite:eldb.sqlite3";
$pdo = new PDO($dsn);

$sql = "select id, title, learning_time from courses";
$st = $pdo->query($sql);
$rows = $st->fetchAll();
foreach ($rows as $row) {
    echo $row["id"] . "," . $row["title"] . "," . $row["learning_time"] . PHP_EOL;
}