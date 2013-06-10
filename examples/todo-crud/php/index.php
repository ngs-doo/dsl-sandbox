<?php
use Todo\Task;
use NGS\Client\StandardProxy;

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch($action)  {
    case 'edit':
        $task = Task::find($_GET['uri']);
        require 'form.php';
        return ;
    case 'create':
        $task = new Task($_POST['task']);
        $task->persist();
        break;
    case 'update':
        $task = Task::find($_GET['uri']);
        foreach($_POST['task'] as $property=>$value)
            $task->$property = $value;
        $task->persist();
        break;
    case 'delete':
        Task::find($_GET['uri'])->delete();
        break;
    case 'delete_all':
        StandardProxy::instance()->delete(Task::findAll());
        break;
    case 'delete_done':
        StandardProxy::instance()->delete(Task::findDone());
        break;
}
$tasks = Task::findAll($limit=10);
require 'grid.php';
