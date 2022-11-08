<?php
require_once("SimpleCalc.php");

class GreatCalc extends SimpleCalc {
    public function pow($x = 2)
    {
        $this->number = $this->number ** $x;
    }
}