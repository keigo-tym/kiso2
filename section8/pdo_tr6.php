<?php
$courses = [
    ["id" => 1, "title" => "PHP Basic", "learning_time" => 0, "category_id" => 1],
    ["id" => 2, "title" => "PHP Database", "learning_time" => 0, "category_id" => 1],
    ["id" => 3, "title" => "Python Basic", "learning_time" => 0, "category_id" => 1],
    ["id" => 4, "title" => "Web Design", "learning_time" => 0, "category_id" => 2],
    ["id" => 5, "title" => "Japan's History", "learning_time" => 0, "category_id" => null],
];
$sql = "insert into courses (id, title, learning_time, category_id) values (:id, :title, :learning_time, :category_id)";

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
            $ps->bindValue(":title", $course["title"], PDO::PARAM_STR);
            $ps->bindValue(":learning_time", $course["learning_time"], PDO::PARAM_INT);
            $ps->bindValue(":category_id", $course["category_id"], PDO::PARAM_INT);
            $ps->execute();
            $rowcount = $ps->rowCount();
            $count += $rowcount;
        }
        $pdo->commit();
        echo "Insert count:" . $count . PHP_EOL;
    } catch (PDOException $e) {
        $pdo->rollBack();
        throw $e;
    }

} catch (PDOException $e) {
    echo $e->getMessage() . PHP_EOL;
}