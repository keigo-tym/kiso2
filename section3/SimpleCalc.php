<?php
class SimpleCalc
{
    private $number;

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

    public function show()
    {
        echo $this->number . PHP_EOL;
    }

}