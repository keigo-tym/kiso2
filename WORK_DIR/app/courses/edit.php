<?php
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

  $sql = "select id, title, learning_time, category_id from courses where id = :id";
  $ps = $pdo->prepare($sql);
  $ps->bindValue(":id", $id, PDO::PARAM_INT);
  $ps->execute();
  $course = $ps->fetch();
  if ($course === false) {
      error_log("Invalid id. $id");
      header("Location: error.php");
      exit();
  }

  $sql = "select id, title from categories order by id";
  $ps = $pdo->prepare($sql);
  $ps->execute();
  $categories = $ps->fetchAll();
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
  <h3>Courses - Edit</h3>
  <hr>
  <form action="update.php" method="post">
    <input type="hidden" name="id" 
          value="<?= htmlspecialchars($course['id']) ?>">
    ID: <?= htmlspecialchars($course['id']) ?><br>
    TITLE: <input type="text" name="title" 
          value="<?= htmlspecialchars($course['title']) ?>"><br>
    L-TIME: <input type="number" name="learning_time"
          value="<?= htmlspecialchars($course['learning_time']) ?>"><br>
    CATEGORY:
    <select name="category_id">
      <?php foreach ($categories as $category) { ?>
      <option value="<?= htmlspecialchars($category['id']) ?>"
        <?= $category["id"] === $course["category_id"] ? "selected" : "" ?>>
        <?= htmlspecialchars($category['title']) ?>
      </option>
      <?php } ?>
    </select><br>
    <button type="submit">UPDATE</button>
  </form>
  <hr>
  <a href="index.php">BACK</a>
</body>
</html>
