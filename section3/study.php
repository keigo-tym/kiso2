<?php

class Student
{
    public $concentration;

    public function __construct($concentration) {
        $this->concentration = $concentration;
    }

    public function study(){
        if ($this->concentration > 0) {
            echo "PHP is fun." . PHP_EOL;
            $this->concentration--;
        } else {
            echo "I'm tired." . PHP_EOL;
        }
    }
}

$student = new Student(3);
$student->study();
$student->study();
$student->study();
$student->study();
$student->study();