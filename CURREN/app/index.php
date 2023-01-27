<?php
require_once("../libs/functions.php");

try {
    $pdo = new_PDO();

    $sql = "select
                co.id,
                co.title course_title,
                ca.title category_title 
            from 
                courses co 
                inner join categories ca on co.category_id = ca.id 
            order by 
                co.id";
    $st = $pdo->query($sql);
    $courses = $st->fetchAll();

    require("../views/index_view.php");
} catch(PDOException $e) {
    error_log($e->getMessage());
    header("Location: error.php");
}
