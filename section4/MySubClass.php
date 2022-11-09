<?php
require_once("MyClass.php");
require_once("MyException.php");

class MySubClass extends MyClass
{ 
    public function myMethod($x)
    {
        if ($x === "") {
            $e = new MyException('$x is empty.');
            throw $e;
        }

        echo "Overreide!" . $this->myProperty . " " . $x . PHP_EOL;
    }
    
    public function myMethod2()
    {
        echo "Hello World" . PHP_EOL;
    }
}