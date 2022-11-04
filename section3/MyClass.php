<?php
class MyClass
{
    public $myProperty;

    public function myMethod($x)
    {
        echo $this->myProperty . " " . $x . PHP_EOL;
    }
}