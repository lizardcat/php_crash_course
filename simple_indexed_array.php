<?php

$cityNames = ["Nairobi", "Kisumu", "Arusha", "Nakuru", "Mombasa"];

echo $cityNames[2];
echo "<br>";

$cityNames[] = "Dodoma";

foreach ($cityNames as $city) {
	echo ucfirst($city) . " ";
}

?>