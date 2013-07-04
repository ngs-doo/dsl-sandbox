<?php
use Todo\Task;
use Todo\MarkDone;

$task = new Task();
$task->persist();

echo 'Task isDone: ';
var_dump($task->isDone);

$event = new MarkDone();
$event->taskURI = $task->URI;
$event->submit();

$task = Task::find($task->URI);
echo '<hr>After submitting event, Task isDone: ';
var_dump($task->isDone);
