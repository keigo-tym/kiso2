<?php
require_once("MyClass.php");

MyClass::$myStaticProperty = "Hello";
MyClass::myStaticMethod("World");