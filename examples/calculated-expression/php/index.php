<?php
use Park\Vehicle;
use Park\Engine;

$car = new Vehicle();
$car->model = 'Mustang GT';
$car->year = 1968;
$car->engine = new Engine(array(
    'serialNumber' => uniqid('', true),
    'power' => 270
));

$car->persist();
?>

<ul>
    <li>Description: <?=$car->description?></li>
    <li>Engine power in Watts: <?=$car->enginePowerInWatts?> W</li>
</ul>