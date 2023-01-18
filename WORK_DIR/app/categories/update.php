<?php
$id = (string)filter_input(INPUT_POST, "id");
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

$title = (string)filter_input(INPUT_POST, "title");
if ($title === "") {
    error_log("Validate: title is required.");
    header("Location: error.php");
    exit();
}
if (mb_strlen($title) > 255) {
    error_log("Validate: title length > 255");
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

    $sql = "update categories set title = :title where id = :id";
    $ps = $pdo->prepare($sql);
    $ps->bindValue(":id", $id, PDO::PARAM_INT);
    $ps->bindValue(":title", $title, PDO::PARAM_STR);
    $ps->execute();

    header("Location: index.php");

} catch (PDOException $e) {
    error_log("PDOException: " . $e->getMessage());
    header("Location: error.php");
}