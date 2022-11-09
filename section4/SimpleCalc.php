<?php
require_once("CalcException.php");

class SimpleCalc
{
    protected $number;

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
        if ($x == 0) {
            $e = new CalcException(CalcException::DIVIDE_BY_ZERO);
            throw $e;
        }
        $this->number = $this->number / $x;
    }

    public function show()
    {
        echo $this->number . PHP_EOL;
    }

}