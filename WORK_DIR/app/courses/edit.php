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
