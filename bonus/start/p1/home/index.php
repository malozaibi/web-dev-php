<?php

require_once '../src/Car.php';
require_once '../src/Plane.php';
require_once '../src/Ship.php';

$car = new Car('Toyota', '99', 2059);
$plane = new Plane('Airbus', 'B', 2009);
$ship = new Ship('Unknown', 'Titanic', 1900);

echo 'hi';
