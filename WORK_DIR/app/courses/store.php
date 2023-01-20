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

$learning_time = (string)filter_input(INPUT_POST, "learning_time");
if ($learning_time === "") {
  error_log("Validate: learning_time is required.");
  header("Location: error.php");
  exit();
}
if (filter_var($learning_time, FILTER_VALIDATE_INT) === false) {
  error_log("Validate: learning_time is not int.");
  header("Location: error.php");
  exit();
}

$category_id = (string)filter_input(INPUT_POST, "category_id");
if ($category_id === "") {
  error_log("Validate: category_id is required.");
  header("Location: error.php");
  exit();
}
if (filter_var($category_id, FILTER_VALIDATE_INT) === false) {
  error_log("Validate: category_id is not int.");
  header("Location: error.php");
  exit();
}
        
try {

  $dsn = "sqlite:../../db/eldb.sqlite3";
  $options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
  ];
  $pdo = new PDO($dsn, null, null, $options);

  $sql = "insert into courses (id, title, learning_time, category_id) 
          values (:id, :title, :learning_time, :category_id)";
  $ps = $pdo->prepare($sql);
  $ps->bindValue(":id", $id, PDO::PARAM_INT);
  $ps->bindValue(":title", $title, PDO::PARAM_STR);
  $ps->bindValue(":learning_time", $learning_time, PDO::PARAM_INT);
  $ps->bindValue(":category_id", $category_id, PDO::PARAM_INT);
  $ps->execute();
  
  header("Location: index.php");

} catch (PDOException $e) {
    error_log("PDOException: " . $e->getMessage());
    header("Location: error.php");
}