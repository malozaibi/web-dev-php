<?php

require_once('Car.php');

$newCar = new Car('Toyota', 'Land Cruiser', 2000);
// $newCar->insertToDB();
echo $newCar->getDetails();
