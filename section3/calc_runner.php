<?php
require_once("SimpleCalc.php");

$calc = new SimpleCalc(10);

// $calc->setNumber(10);

$calc->add(20);
$calc->add(30);
$calc->show();