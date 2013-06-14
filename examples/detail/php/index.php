<?php
use Todo\Task;
use Todo\Group;

$group = new Group();
$group->name = 'Bugs';
$group->persist();

$task1 = new Task(array('name'=>'Bug #'.rand(0, 1000), 'group'=>$group));
$task2 = new Task(array('name'=>'Bug #'.time(0, 1000), 'group'=>$group));
$task1->persist();
$task2->persist();

// we can reference detail property to get all tasks
Group::find($group->URI);
$groupTasks = $group->tasks;

?>
