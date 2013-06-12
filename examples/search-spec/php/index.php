<?php
use Todo\Task;
use Todo\Task\findDone;

$limit = 10;
$offset = 0;
$doneTasks = Task::findDone($limit, $offset);

// limit and offset are optional
// calling Task::findDone() without parameters will fetch _all_ done tasks

// we can get a total count for specification
$spec = new Task\findDone();
$doneCount = $spec->count();

?>

<p>Found total of <?=$doneCount?> done task(s)</p>
<ul>
<? foreach ($doneTasks as $task): ?>
    <li>
        <?=$task->name?>
        <i class="badge"><?=$task->created->format('M d, h:i')?></i>
    </li>
<? endforeach ?>
</ul>
