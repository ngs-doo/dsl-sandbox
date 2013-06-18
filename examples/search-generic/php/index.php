<?php
use Todo\Task;
use NGS\Patterns\GenericSearch;

$search = new GenericSearch('Todo\\Task');

$search->equals('isDone', false);

// gte = Greater Than or Equal
$search->gte('priority', 0);

// lte = Less Than or Equal
$search->lte('priority', 2);

// filter tasks created in the last 15 days
$today = new DateTime();
$dt = $today->sub(new DateInterval('P15D'));
// gte = 'Greater Than or Equal' filter can be used with dates
$search->gte('created', $dt->format('Y-m-d'));

$count = $search->count();
$tasks = $search->search();
?>

<p>Found total of <?=$count?> task(s)</p>
<ul>
<? foreach ($tasks as $task): ?>
    <li>
        <?=$task->name?>
        <i class="badge"><?=$task->created->format('M d, h:i')?></i>
    </li>
<? endforeach ?>
</ul>
