<?php
$id = 3;
$sql = "select * from categories where id = ?";

try  {
    $dsn = "sqlite:eldb.sqlite3";
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $ps = $pdo->prepare($sql);
    $ps->bindValue(1, $id, PDO::PARAM_INT);
    $ps->execute();
    $row = $ps->fetch();
    
    echo $row["title"] . PHP_EOL;

} catch (PDOException $e) {
    echo $e->getMessage() . PHP_EOL;
}