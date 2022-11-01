<?php
$dsn = "sqlite:eldb.sqlite3";
$pdo = new PDO($dsn);

$sql = "select id, title courses";
$st = $pdo->query($sql);
$rows = $st->fetchAll();
foreach($rows as $row) {
    echo $row["id"] . "," . $row["title"] . PHPEOL;
}