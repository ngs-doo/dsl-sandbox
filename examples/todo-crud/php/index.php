<?php
use Todo\Task;
use NGS\Client\StandardProxy;

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch($action)  {
    case 'create':
    case 'update':
        $task = new Task($_POST['task']);
        $task->persist();
        break;
    case 'delete':
        $task = Task::find($_GET['id']);
        $task->delete();
        break;
    case 'delete_all':
        StandardProxy::instance()->delete(Task::findAll());
        break;
}
$tasks = Task::findAll($limit=10);

require 'grid.php';
