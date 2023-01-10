<?php
try {
    $dsn = "sqlite:eldb.sqlite3";
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "insert into categories (id, title) values (?, ?)";
    $ps = $pdo->prepare($sql);

    $id = 4;
    $title = "Photo";
    $ps->bindValue(1, $id, PDO::PARAM_INT);
    $ps->bindValue(2, $title, PDO::PARAM_STR);

    $ps->execute();
    $count = $ps->rowCount();
    echo "Count: $count" . PHP_EOL;
} catch (PDOExeption $e) {
    echo $e->getMessage() . PHP_EOL;
}