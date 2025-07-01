<?php
function isPalindrome($str) {
    $len = strlen($str);
    for ($i = 0; $i < $len / 2; $i++) {
        if ($str[$i] !== $str[$len - 1 - $i]) {
            return false;
        }
    }
    return true;
}

// Eg
$input = "madam";
var_dump(isPalindrome($input));
?>
