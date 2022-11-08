<?php
class SimpleCalc
{
    private $number;

    public function __construct($number = 0)
    {
        $this->number = $number;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function add($x)
    {
        $this->number = $this->number + $x;
    }

    public function subtract($x)
    {
        $this->number = $this->number - $x;
    }

    public function multiply($x)
    {
        $this->number = $this->number * $x;
    }

    public function divide($x)
    {
        $this->number = $this->number / $x;
    }

    public function show()
    {
        echo $this->number . PHP_EOL;
    }

}