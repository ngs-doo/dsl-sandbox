<?php
use Football\Team;
use Football\Player;

$manUtd = new Team();
$manUtd->name = 'Man Utd';
$manUtd->persist();

$ryan = new Player();
$ryan->name = 'Ryan Giggs';
$ryan->team = $manUtd;
$ryan->persist();

?>
<pre>
    <? print_r($manUtd); ?>

    <? print_r($ryan); ?>
</pre>