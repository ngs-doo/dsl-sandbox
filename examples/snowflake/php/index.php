<?php
use Todo\TaskList;

$limit = 10;
$items = TaskList::findAll($limit);
?>

<table class="table">
<tr><th>Priority</th><th>Name</th><th>Done</th></tr>
<? foreach ($items as $item): ?>
<tr>
    <td><?=$item->priority?></td>
    <td><?=$item->name?></td>
    <td><?=$item->isDone ? '+' : '-' ?></td>
</tr>
<? endforeach ?>
</table>
