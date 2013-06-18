<?php
use Todo\Task;
use Todo\Group;

$bugsGroup = new Group();
$bugsGroup->name = 'Bugs';
$bugsGroup->persist();

// insert 2 tasks that reference 'Bugs' group
$task1 = new Task(array(
    'name'  => 'Bug #'.rand(0, 999),
    'group' => $bugsGroup));
$task2 = new Task(array(
    'name'  => 'Bug #'.rand(1000, 2000),
    'group' => $bugsGroup));
$task1->persist();
$task2->persist();

// reload group to get all references by detail property
$group = Group::find($bugsGroup->URI);
$groupTasks = $group->tasks;

?>

Tasks referencing group 'Bugs':
<ul>
<? foreach ($group->tasks as $task): ?>
    <li><?=$task->name?></li>
<? endforeach ?>
</ul>