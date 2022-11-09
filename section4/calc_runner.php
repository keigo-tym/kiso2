<?php
require_once("GreatCalc.php");
require_once("CalcException.php");

try {
    $calc = new GreatCalc();

    $calc->divide(0);

    $calc->show();
} catch(CalcException $e) {
    echo "CalcException: " . $e->getMessage() . PHP_EOL;
}
