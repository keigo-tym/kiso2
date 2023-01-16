<?php
$courses = [
    ["id" => 1, "learning_time" => 30],
    ["id" => 2, "learning_time" => 50],
    ["id" => 3, "learning_time" => 40],
    ["id" => 4, "learning_time" => 50],
    ["id" => 5, "learning_time" => 100],
];
$sql = "update courses set learning_time = :learning_time where id = :id";

try {
    $pdo = new PDO("sqlite:eldb.sqlite3");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $pdo->beginTransaction();
    try {
        $ps = $pdo->prepare($sql);
        $count = 0;
        foreach ($courses as $course) {
            $ps->bindValue(":id", $course["id"], PDO::PARAM_INT);
            $ps->bindValue(":learning_time", $course["learning_time"], PDO::PARAM_INT);
            $ps->execute();
            $rowcount = $ps->rowCount();
            $count += $rowcount;
        }
        $pdo->commit();
        echo "Update count:" . $count . PHP_EOL;
    } catch (PDOException $e) {
        $pdo->rollBack();
        throw $e;
    }

} catch (PDOException $e) {
    echo $e->getMessage() . PHP_EOL;
}