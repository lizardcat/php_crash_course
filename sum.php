<?php
$number1 = $_GET['number1'] ?? 0;
$number2 = $_GET['number2'] ?? 0;

$sum = $number1 + $number2;

echo "Sum is: $sum";
