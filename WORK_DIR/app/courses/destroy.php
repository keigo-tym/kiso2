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

try {

    $dsn = "sqlite:../../db/eldb.sqlite3";
    $options = [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_EMULATE_PREPARES => false
    ];
    $pdo = new PDO($dsn, null, null, $options);
  
    $sql = "delete from courses where id = :id";
    $ps = $pdo->prepare($sql);
    $ps->bindValue(":id", $id, PDO::PARAM_INT);
    $ps->execute();
    
    header("Location: index.php");
  
  } catch (PDOException $e) {
      error_log("PDOException: " . $e->getMessage());
      header("Location: error.php");
  }
