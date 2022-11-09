<?php
require_once("MySubClass.php");

try {
    $mySubClass = new MySubClass("Hello");
    $mySubClass->myMethod("");
    $mySubClass->myMethod2();
} catch(MyException $e) {
    echo "Catch exception." . PHP_EOL;
    echo $e->getMessage() . PHP_EOL;
}
