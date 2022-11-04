<?php
require_once("SimpleCalc.php");

$calc = new SimpleCalc();
$calc2 = new SimpleCalc();

$calc->number = 10;
$calc2->number = 20;

echo $calc->number . PHP_EOL;
echo $calc2->number . PHP_EOL;

var_dump($calc);
var_dump($calc2);