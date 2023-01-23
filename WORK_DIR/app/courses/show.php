<?php
// TODO
$id = (string)filter_input(INPUT_GET, "id");
if ($id === "") {
    error_log("Validate: id is required.");
    header("Location: error.php");
    exit();
}
if (filter_var($id, FILTER_VALIDATE_INT) === false) {
    error_log("Validate: id is not int.");
    header("Location: error.php");
    exit();
}

try {
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ];
    $pdo = new PDO("sqlite:../../db/eldb.sqlite3",null, null, $options);

    $sql = "select
            co.id, co.title, co.learning_time, ca.title category_title
            from
            courses co left join categories ca on category_id = ca.id
            where
            co.id = :id";
    $ps = $pdo->prepare($sql);
    $ps->bindValue(":id", $id, PDO::PARAM_INT);
    $ps->execute();
    $course = $ps->fetch();
    if ($course === false) {
        error_log("Invalid id. $id");
        header("Location: error.php");
        exit();
    }
} catch (PDOException $e) {
    error_log("PDOException: " . $e->getMessage());
    header("Location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>PHP DB</title>
</head>
<body>
  <h3>Courses - Show</h3>
  <hr>
  ID: <?= htmlspecialchars($course['id']) ?><br>
  TITLE: <?= htmlspecialchars($course['title']) ?><br>
  L-TIME: <?= htmlspecialchars($course['learning_time']) ?><br>
  CATEGORY: <?= htmlspecialchars($course['category_title']) ?><br>
  <hr>
  <a href="index.php">BACK</a>
</body>
</html>
