<?php
use Todo\Task;

$fix = new Task();
$fix->name = 'Fix bug!';
$fix->isDone = false;
$fix->persist();

$create = new Task();
$create->name = 'Create a task';
$create->isDone = true;
$create->persist();

$limit = 5;
$doneTasks = Task::findDone($limit);
?>

<div>Found total of <b><?=count($doneTasks)?></b> done tasks:</div>
<ul>
    <? foreach ($doneTasks as $task): ?>
    <li><?=$task->name?></li>
    <? endforeach ?>
</ul>
