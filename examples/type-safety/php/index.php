<?php
use Todo\Task;

$task = new Task();

try {
    $task->name = false;
} catch (InvalidArgumentException $ex) {
    echo $ex->getMessage().'<br>'; }

try {
    $task->priority = '';
} catch (InvalidArgumentException $ex) {
    echo $ex->getMessage().'<br>'; }

// primitive types are converted if possible
// a) string can be safely converted to integer
$task->priority = '123';
echo '$task->priority value: '.$task->priority.'<br>';
echo '$task->priority type: '.gettype($task->priority).'<br>';

// b) fails, as converting to integer will lose some information
try {
    $task->priority = '123.45';
} catch (InvalidArgumentException $ex) {
    echo $ex->getMessage().'<br>'; }

// setters for non-primitive types will call appropriate constructor
// whihc means following statements are equivalent
$task->created = new NGS\Timestamp('2013-05-25');
$task->created = '2013-05-25';
