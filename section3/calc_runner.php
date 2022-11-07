<?php
require_once("SimpleCalc.php");

$calc = new SimpleCalc(10);
$calc2 = new SimpleCalc();


// $calc->setNumber(10);

$calc->add(20);
$calc->add(30);
$calc->show();

$calc2->add(100);
$calc2->show();