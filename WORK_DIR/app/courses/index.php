<?php
try {
  $dsn = "sqlite:../../db/eldb.sqlite3";
  $options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
  ];
  $pdo = new PDO($dsn, null, null, $options);

  $sql = "select co.id, co.title, co.learning_time, ifnull(ca.title, '') category_title 
        from courses co left join categories ca on co.category_id = ca.id order by co.id";
  $ps = $pdo->prepare($sql);
  $ps->execute();
  $courses = $ps->fetchAll();
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
  <h3>Courses - Index</h3>
  <hr>
  <table border="1">
    <tr>
      <th>ID</th>
      <th>TITLE</th>
      <th>L-TIME</th>
      <th>CATEGORY</th>
      <th>SHOW</th>
    </tr>
    <?php foreach ($courses as $course) { ?>
    <tr>
      <td><?= htmlspecialchars($course["id"]) ?></td>
      <td><?= htmlspecialchars($course["title"]) ?></td>
      <td><?= htmlspecialchars($course["learning_time"]) ?></td>
      <td><?= htmlspecialchars($course["category_title"]) ?></td>
      <td><a href="show.php?id=<?= htmlspecialchars($course['id'])?>">SHOW</a></td>
    </tr>      
    <?php } ?>
  </table>
  <hr>
  <a href="create.php">CREATE</a>
</body>
</html>
