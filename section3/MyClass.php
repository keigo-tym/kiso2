<?php
class MyClass
{
    private $myProperty;

    public function myMethod($x)
    {
        echo $this->myProperty . " " . $x . PHP_EOL;
    }

    public function setMyProperty($myProperty)
    {
        $this->myProperty = $myProperty;
    }

    public function getMyProperty()
    {
        return $this->myProperty;
    }
}