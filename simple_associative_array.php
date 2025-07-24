<?php 

$userProfile = ["name" => "Alex", "email" => "araza@google.com", "is_admin" => true];

echo $userProfile["email"];

echo "</br>";

$count = 0;

foreach ($userProfile as $key => $value) {
	$count++;
};

echo $count;

echo "</br>";

if (in_array("admin", $userProfile)) {
	echo "'admin' is in the array";
} else {
	echo "'admin' is not a value in the array";
}

echo "</br>";

foreach ($userProfile as $key => $value) {
	echo $key;
	echo "</br>";
}