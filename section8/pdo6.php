<?php
$dsn = "sqlite:eldb.sqlite3";
$pdo = new PDO($dsn);

$sql = "select id, title from categories";
$st = $pdo->query($sql);

$rows = $st->fetchAll(PDO::FETCH_OBJ);
foreach ($rows as $row) {
    echo $row->id . ":" . $row->title . PHP_EOL;
}