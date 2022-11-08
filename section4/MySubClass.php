<?php
require_once("MyClass.php");

class MySubClass extends MyClass
{
    public function myMethod2()
    {
        echo "Hello World" . PHP_EOL;
    }
}