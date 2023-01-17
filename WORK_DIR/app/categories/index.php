<?php
try {
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ];
    $pdo = new PDO("sqlite:../../db/eldb.sqlite3", null, null, $options);

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
    <h3>Categories - Index</h3>
    <hr>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>TITLE</th>
        </tr>
        <?php foreach ($categories as $category) { ?>
        <tr>
            <td><?= htmlspecialchars($category["id"]) ?></td>
            <td><?= htmlspecialchars($category["title"]) ?></td>
        </tr>
        <?php } ?>
    </table>
    <hr>
    <a href="create.php">NEW</a>
</body>
</html>