<?php
use Park\CurrentState;

$state = new CurrentState();
$state->litersInTank = 24.7;
$state->mileage = 33105;
$state->oilChangeIn = 35;

?>

<pre>
    <? var_dump($state); ?>
</pre>