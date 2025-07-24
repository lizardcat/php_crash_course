<?php

$browser = $_SERVER['HTTP_USER_AGENT'];

if (str_contains($browser, 'Firefox')) {
    echo "You are using Firefox!";
} elseif (str_contains($browser, 'Chrome')) {
    echo "You are using Chrome!";
}