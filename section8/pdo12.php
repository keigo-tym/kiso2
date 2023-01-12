<?php
try {
    $dsn = "sqlite:eldb.sqlite3";
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "insert into categories (id, title) values (:id, :title)";
    $ps = $pdo->prepare($sql);

    $id = 5;
    $title = "Biz";
    $ps->bindValue(":id", $id, PDO::PARAM_INT);
    $ps->bindValue(":title", $title, PDO::PARAM_STR);

    $ps->execute();
    $count = $ps->rowCount();
    echo "Count: $count" . PHP_EOL;
} catch (PDOException $e) {
    echo $e->getMessage() . PHP_EOL;
}