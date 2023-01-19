<?php
// TODO
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
