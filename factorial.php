<?php
function factorial($n) {
    if ($n <= 1) return 1;
    return $n * factorial($n - 1);
}

// Example 
$number = 5;
echo factorial($number);
?>
