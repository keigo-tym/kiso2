<?php
try {
    $dsn = "sqlite:eldb.sqlite3";
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "select * from categories where title = ?";
    $ps = $pdo->prepare($sql);
    
    $title = "Photo";
    $ps->bindValue(1, $title, PDO::PARAM_STR);

    $ps->execute();
    $rows = $ps->fetchAll();
    var_dump($rows);
} catch (PDOException $e) {
    echo $e->getMessage() . PHP_EOL;
}