<?php
require_once("SimpleCalc.php");

class GreatCalc extends SimpleCalc 
{
    protected $message = "Answer: ";
    
    public function pow($x = 2)
    {
        $this->number = $this->number ** $x;
    }

    public function show()
    {
        echo $this->message;
        echo $this->number . PHP_EOL;
    }
}