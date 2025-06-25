<?php
function isPrime($num) {
    if ($num < 2) return false;
    if ($num === 2) return true;
    if ($num % 2 === 0) return false;
    for ($i = 3; $i <= sqrt($num); $i += 2) {
        if ($num % $i === 0) return false;
    }
    return true;
}

function generatePrimes($limit) {
    $primes = [];
    for ($i = 2; $i <= $limit; $i++) {
        if (isPrime($i)) $primes[] = $i;
    }
    return $primes;
}

// Example usage
$limit = 100;
$primes = generatePrimes($limit);
print_r($primes);
?>
