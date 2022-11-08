<?php
require_once("MyClass.php");

echo "1" . PHP_EOL;
try {
    $myClass = new MyClass("Hello");
    $myClass->myMethod("Andy");
    echo "2" . PHP_EOL;
} catch (Exception $e) {
    echo "Catch exception." . PHP_EOL;
    echo $e->getMessage() . PHP_EOL;
    echo "3" . PHP_EOL;
}
echo "4" . PHP_EOL;
