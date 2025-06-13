<?php 

$dep = 1000;
$interest = 0.05;

for ($time = 1; $time <= 5; $time++) {
    $dep += $dep * $interest;
    echo "The total amount after " . $time . " years is: $" . number_format($dep, 2);
    echo "<br>";
}