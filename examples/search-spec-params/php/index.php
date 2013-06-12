<?php
use Todo\Task;

$tasks = array();
$query = isset($_GET['query']) ? $_GET['query'] : null;

if($query)
    $tasks = Task::findByName($_GET['query']);
?>

<form method="get" accept-charset="utf-8">
    <input type="text" name="query" value="<?=$query?>" placeholder="enter query">
    <button type="submit" class="btn">Search</button>
</form>

<? if ($query): ?>
<ul>
    <? if (!count($tasks)): ?>
        <span>No tasks found</span>
    <? else: ?>
        <? foreach ($tasks as $task): ?>
            <li>
                <?=$task->name?>
                <i class="badge"><?=$task->created->format('M d, h:i')?></i>
            </li>
        <? endforeach ?>
    <? endif ?>
    </ul>
<? endif ?>