<?php
use Park\Vehicle;
use Park\Company;
use Park\Engine;
use Park\CurrentState;

$car = new Vehicle();

// reference to root
$company = new Company(array('name'=>'Ford'));
$company->persist();
$car->company = $company;

// reference to entity
$engine = new Engine();
$engine->serialNumber = '123';
$car->engine = $engine;


$state = new CurrentState();
$state->litersInTank = 24.55;
$car->state = $state;

?>

<pre>
    <? print_r($car); ?>
</pre>
