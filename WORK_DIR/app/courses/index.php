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
  <h3>Courses - Index</h3>
  <hr>
  <table border="1">
    <tr>
      <th>ID</th>
      <th>TITLE</th>
      <th>L-TIME</th>
      <th>CATEGORY</th>
    </tr>
    <?php foreach ($courses as $course) { ?>
    <tr>
      <td><?= htmlspecialchars($course["id"]) ?></td>
      <td><?= htmlspecialchars($course["title"]) ?></td>
      <td><?= htmlspecialchars($course["learning_time"]) ?></td>
      <td><?= htmlspecialchars($course["category_title"]) ?></td>
    </tr>      
    <?php } ?>
  </table>
</body>
</html>
