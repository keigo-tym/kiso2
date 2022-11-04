<?php
class SimpleCalc
{
    public $number;

    public function add($x)
    {
        $this->number = $this->number + $x;
    }

    public function show()
    {
        echo $this->number . PHP_EOL;
    }
}