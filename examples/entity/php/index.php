<?php
use Park\Engine;

// set properties on an instantiated object
$engine = new Engine();
$engine->serialNumber = 'ABC-123';
$engine->power = 210;

// set property values by passing array to constructor
$anotherEngine = new Engine(array(
    'serialNumber' => 'QWE-555',
    'power' => 210
));

?>

<pre>
<? print_r($engine); ?>
</pre>

<span class="alert alert-info">URI property is empty. That's because it is assigned a value only after peristing an object. Take a look at 'Aggregate root' example for details.</span>
