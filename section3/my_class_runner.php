<?php
require_once("MyClass.php");

$myClass = new MyClass();

$myClass->setMyProperty("Hello");
echo $myClass->getMyProperty();