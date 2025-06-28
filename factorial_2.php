<?php
$n = 5; // change this to the number you want to calculate the factorial of
$factorial = 1;  

for ( $myCount= $n;  $myCount>= 1;  $myCount--) {  
  $factorial *=  $myCount;  
}

echo "The factorial of $n is $factorial.";
?>