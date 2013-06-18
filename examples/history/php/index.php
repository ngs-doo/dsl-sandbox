<?php
use Football\Team;

$team =  new Team();
$team->name = 'Man';
$team->persist(); // inserting team

$team->name = 'Man Utd';
$team->persist(); // updating team, changing name

$team->name = 'Manchester Utd';
$team->persist(); // updating team, another name change

$team->delete();  // finally, delete the team

$history = Team::getHistory($team->URI);

?>

<ol>
<? foreach ($history as $h): ?>
    <li>
    <strong><?=$h->action?></strong>
    at: <?=$h->at->format('Y-m-d h:i:s.u')?>, 
    name value: <strong><?=$h->value->name?></strong>
    </li>
<? endforeach ?>
</ol>
    
