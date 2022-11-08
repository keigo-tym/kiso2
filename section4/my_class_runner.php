<?php
require_once("MyClass.php");

try {
    $myClass = new MyClass("Hello");
    $myClass->myMethod("");
} catch (Exception $e) {
    echo "Catch exception." . PHP_EOL;
    echo $e->getMessage() . PHP_EOL;
}
