<?php

class Car {
    public $color;

    public function __construct($color) {
        $this->color = $color;
    }

    public function drive() {
        echo "Driving a $this->color car.";
    }
}

$myCar = new Car("red"); // This is an instance of the Car class

$myCar->drive(); // Outputs: Driving a red car.
