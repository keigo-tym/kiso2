<?php
require_once("MyClass.php");

$myClass1 = new MyClass();
$myClass2 = new MyClass();

$myClass1->myProperty = "Hello";
$myClass2->myProperty = "By";

echo $myClass1->myProperty;
echo $myClass2->myProperty;