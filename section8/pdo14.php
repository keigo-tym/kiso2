<?php
$categories = [
    ["id" => 6, "title" => "Guitar"],
    ["id" => 7, "title" => "Piano"],
    ["id" => 8, "title" => "Drum"],
];

try  {
    $dsn = "sqlite:eldb.sqlite3";
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $sql = "insert into categories (id, title) values (:id, :title)";
    $ps = $pdo->prepare($sql);

    $pdo->beginTransaction();
    try {
        foreach ($categories as $category) {
            $ps->bindValue(":id", $category["id"], PDO::PARAM_INT);
            $ps->bindValue(":title", $category["title"], PDO::PARAM_STR);
            $ps->execute();
            echo "Insert: " . $category["title"] . PHP_EOL;
        }
        $pdo->commit();
    } catch (PDOException $e) {
        $pdo->rollBack();
        throw $e;
    }
} catch (PDOException $e) {
    echo $e->getMessage() . PHP_EOL;
}