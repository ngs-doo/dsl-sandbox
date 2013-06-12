<?php
use Todo\Task;
use Task\findDone;

$totalCount = Task::count();

$findDone = new Task\findDone();
$doneCount = $findDone->count();

if(isset($_GET['query'])) {

    $tasks = Task::findByName($_GET['query']);
}
?>

<ul>
    <li>Total tasks: <strong><?=$totalCount?></strong></li>
    <li>Completed tasks: <strong><?=$doneCount?></strong></li>
</ul>



<form method="get" class="form-inline">
    <label>Search tasks by name:</label>
    <input type="text" name="query" placeholder="query">
</form>