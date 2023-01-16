<?php
$dsn = "sqlite:eldb.sqlite3";
$pdo = new PDO($dsn);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$id = filter_input(INPUT_GET, "id");

// Prepared Statement
$sql = "select id, title from categories where id = :id";
$st = $pdo->prepare($sql);
$st->bindValue(":id", $id, PDO::PARAM_INT);
$st->execute();

$rows = $st->fetchAll();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>SQL Injection Sample</title>
</head>
<body>
    <h3>Category - Search</h3>
    <hr>
    <ul>
    <?php foreach ($rows as $row) { ?>
        <li><?= htmlspecialchars($row["title"]) ?></li>
    <?php } ?>
    </ul>
</body>
</html>