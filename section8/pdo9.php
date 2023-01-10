<?php
try {
    $dsn = "sqlite:eldb.sqlite3";
    $pdo = new PDO($dsn);
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "select id, title from categories";
    $st = $pdo->query($sql);
    var_dump($st);

} catch (PDOException $e) {
    echo "catch" . PHP_EOL;
    echo $e->getCode() . PHP_EOL;
    echo $e->getMessage() . PHP_EOL;
}
echo "end" . PHP_EOL;