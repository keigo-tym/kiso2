<?php
        
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


} catch (PDOException $e) {
        error_log("PDOException: " . $e->getMessage());
        header("Location: error.php");
        exit();
}