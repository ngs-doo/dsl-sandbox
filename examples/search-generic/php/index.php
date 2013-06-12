<?php
use Todo\Task;
use NGS\Patterns\GenericSearch;

$search = new GenericSearch('Todo\\Task');

$search->equals('isDone', false);

$days = 3;
$minPriority = 0;
$maxPriority = 2;

// gte = Greater Than or Equal
$search->gte('priority', $minPriority);

// lte = Less Than or Equal
$search->lte('priority', $maxPriority);

// only tasks cweekBeforereated in the last 3 days
$today = new DateTime();
$dt = $today->sub(new DateInterval('P'.$days.'D'));
$search->gte('created', $dt->format('Y-m-d'));

$count = $search->count();
$tasks = $search->search();
?>

<p>Found total of <?=$count?> done task(s)</p>
<ul>
<? foreach ($tasks as $task): ?>
    <li>
        <?=$task->name?>
        <i class="badge"><?=$task->created->format('M d, h:i')?></i>
    </li>
<? endforeach ?>
</ul>
