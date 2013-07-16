<?php
use Park\Vehicle;
use Park\Company;
use Park\Engine;
use Park\CurrentState;

$car = new Vehicle();

// reference to root, note that root is first persisted, and only then referenced
$company = new Company(array('name'=>'Ford'));
$company->persist();
$car->company = $company;

// reference to entity
$engine = new Engine();
$engine->serialNumber = '123';
$car->engine = $engine;

// reference to value
$state = new CurrentState();
$state->litersInTank = 24.55;
$car->state = $state;

?>

<pre>
    <? var_dump($car); ?>
</pre>
