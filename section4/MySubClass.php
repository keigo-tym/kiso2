<?php
require_once("MyClass.php");

class MySubClass extends MyClass
{
    
    public function myMethod($x)
    {
        echo "Overreide!" . $this->myProperty . " " . $x . PHP_EOL;
    }
    
    public function myMethod2()
    {
        echo "Hello World" . PHP_EOL;
    }
}