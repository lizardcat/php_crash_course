<?php

$students = [

    ["name" => "Mwangi", "score" => 85],

    ["name" => "Ogola", "score" => 92],

    ["name" => "Wangare", "score" => 78]

];

for ($i = 0; $i < count($students); $i++) {

    echo $students[$i]["name"] . " scored " . $students[$i]["score"] . "<br>";

}

?>