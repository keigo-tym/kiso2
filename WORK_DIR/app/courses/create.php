<?php
try {
  $dsn = "sqlite:../../db/eldb.sqlite3";
  $options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
  ];
  $pdo = new PDO($dsn, null, null, $options);

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
  <h3>Courses - Create</h3>
  <hr>
  <form action="store.php" method="post">
    ID: <input type="number" name="id"><br>
    TITLE: <input type="text" name="title"><br>
    L-TIME: <input type="number" name="learning_time"><br>
    CATEGORY:
    <select name="category_id">
      <?php foreach ($categories as $category) { ?>
      <option value="<?= htmlspecialchars($category['id']) ?>">
        <?= htmlspecialchars($category['title']) ?>
      </option>
      <?php } ?>
    </select><br>
    <button type="submit">STORE</button>
  </form>
  <hr>
  <a href="index.php">BACK</a>
</body>
</html>