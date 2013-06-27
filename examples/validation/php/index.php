<?php
use Park\Vehicle;
use Park\Engine;

$car = new Vehicle();
$car->engine = new Engine(array('serialNumber'=>time(), 'power'=>100));

$car->model = 'abc';

// invalid year according to validation
$car->year = 2122;



try {
    $car->persist();
} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>