<?php
use Park\Vehicle;
use Park\Engine;

$mustang = new Vehicle();
$mustang->model = 'Mustang GT';
$mustang->year = 1968;
$mustang->engine = new Engine(array(
    'serialNumber' => uniqid('', true),
    'power' => 270
));

$beetle = new Vehicle();
$beetle->model = 'VW Beetle';
$beetle->year = 1973;
$beetle->engine = new Engine(array(
    'serialNumber' => uniqid('', true),
    'power' => 65
));

$cars = array($mustang, $beetle);
array_walk($cars, function(&$car) { $car->persist(); });

?>

<? foreach ($cars as $car): ?>
<p><?=$car->model?> is a <? if($car->muscleCar): ?> MUSCLE <? endif ?> car.</p>
<? endforeach ?>
