<?php
// https://chatgpt.com/share/dfa765d0-3ac8-483e-9304-a60ba86e4094
// https://github.com/kwn/number-to-words


require '../vendor/autoload.php';

use App\Car;
use App\Plane;
use App\Ships\Ship;

use NumberToWords\NumberToWords;

echo NumberToWords::transformCurrency('ar', 244539, 'USD');

$car = new Car('Toyota', '99', 2059);
$plane = new Plane('Airbus', 'B', 2009);
$ship = new Ship('Unknown', 'Titanic', 1900);

echo '<br>';
echo 'hi';
