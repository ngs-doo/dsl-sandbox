<?php
use Todo\Task;
use Todo\Task\findByName;

$tasks = array();
$query = isset($_GET['query']) ? $_GET['query'] : null;

$limit = 10;
$offset = 0;

if($query) {
    // 1) call static  function
    $tasks = Task::findByName($_GET['query'], $limit, $offset);
} else {
    // 2) create object and call search method
    $spec = new findByName();
    $spec->query = 'task';
    $tasks = $spec->search($limit, $offset);
}
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