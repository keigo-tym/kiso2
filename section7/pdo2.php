<?php
$dsn = "sqlite:eldb.sqlite3";
$pdo = new PDO($dsn);

$sql = "select id, title from categories";
$st = $pdo->query($sql);
$rows = $st->fetchAll();
foreach ($rows as $row) {
    echo $row["id"] . ":" . $row["title"] . PHP_EOL;
}

// $row = $st->fetch();
// while($row !== false) {
//     echo $row["id"] . ":" . $row["title"] . PHP_EOL;
//     $row = $st->fetch();
// }