<?php
require_once("SimpleCalc.php");

try {
    $calc = new SimpleCalc();

    $calc->add(10);
    $calc->subtract(5);
    $calc->multiply(10);
    $calc->divide(0);

    $calc->show();
} catch (Exception $e) {
    echo "Exception: " . $e->getMessage() . PHP_EOL;
}
