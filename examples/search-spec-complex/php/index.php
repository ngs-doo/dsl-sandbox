<?php
use Todo\Task;
use Todo\Task\findRecent;

$spec = new findRecent();
$spec->days = 15;
$spec->minPriority = 0;
$spec->maxPriority = 4;
$tasks = $spec->search();
?>

<ul>
<? foreach ($tasks as $task): ?>
    <li>
        <?=$task->name?>
        <i class="badge"><?=$task->created->format('M d, h:i')?></i>
    </li>
<? endforeach ?>
</ul>
