<?php
use Todo\Task;

$fix = new Task();
$fix->name = 'Urgent bugfix!';
$fix->priority = 0;
$fix->persist();

$feat = new Task();
$feat->name = 'Feature xyz';
$feat->priority = 5;

$fix->persist();
$feat->persist();

?>

<? foreach (array($fix, $feat) as $task): ?>
<p>
    <?=$task->name?>
    <? if ($task->isImportant): ?>
        <label class="badge badge-important">important</label>
    <? else: ?>
        <label class="badge">todo later</label>
    <? endif ?>
</p>
<? endforeach ?>