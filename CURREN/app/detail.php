<?php
require_once("../libs/functions.php");
$course_id = (string)filter_input(INPUT_GET, "course_id");
if ($course_id === "") {
    error_log("Validate: course_id is required.");
    header("Location: error.php");
    exit();
}
if (filter_var($course_id, FILTER_VALIDATE_INT) === false) {
    error_log("Validate: course_id is not int.");
    header("Location: error.php");
    exit();
}

$section_id = (string)filter_input(INPUT_GET, "section_id");
if ($section_id !== "" && filter_var($section_id, FILTER_VALIDATE_INT) === false) {
    error_log("Validate: section_id is not int.");
    header("Location: error.php");
    exit();
}

try {
    $pdo = new_PDO();
    $sql = "select 
                co.id,
                co.title course_title,
                ca.title category_title
            from
                courses co
                inner join categories ca on co.category_id = ca.id
            where
                co.id = :id";
    $ps = $pdo->prepare($sql);
    $ps->bindValue(":id", $course_id, PDO::PARAM_INT);
    $ps->execute();
    $course = $ps->fetch();
    if ($course === false) {
        error_log("Invalid course id." . $course_id);
        header("Location: error.php");
        exit();
    }

    $sql = "select
                se.id,
                se.title,
                se.no,
                se.url,
                se.course_id
            from
                sections se
            where
                se.course_id = :course_id
            order by
                se.no";
    $ps = $pdo->prepare($sql);
    $ps->bindValue(":course_id", $course_id, PDO::PARAM_INT);
    $ps->execute();
    $sections = $ps->fetchAll();
    if (count($sections) === 0) {
        error_log("Invalid sections." . $course_id);
        header("Location: error.php");
        exit();
    }

    $current_section = $sections[0];
    foreach ($sections as $section) {
        if ((int)$section["id"] === (int)$section_id) {
            $current_section = $section;
            break;
        }
    }

    require("../views/detail_view.php");
} catch(PDOException $e) {
    error_log($e->getMessage());
    header("Location: error.php");
} 
