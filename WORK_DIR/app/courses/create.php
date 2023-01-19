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