<form action="?action=create" method="post" class="form-inline">
    <input type="text" name="task[name]" placeholder="Enter task name">
    <button type="submit" class="btn btn-small">Create new task</button>
</form>

<? if (!count($tasks)): ?>
    <span class="alert">No tasks found</span>
<? else: ?>
    <a href="?action=delete_all">Delete all</a>
    |
    <a href="?action=delete_done">Delete completed</a>

    <table class="table table-condensed">
        <tr>
            <th>Task</th>
            <th>Completed</th>
            <th></th>
        </tr>
    <? foreach ($tasks as $task): ?>
        <tr>
            <td><?=$task->name?></td>
            <td><?=$task->isDone ? 'done' : '-' ?></td>
            <td>
                <a href="?action=edit&uri=<?=$task->URI?>"><i class="icon icon-pencil"></i></a>
                |
                <a href="?action=delete&uri=<?=$task->URI?>"><i class="icon icon-trash"></i></a>
            </td>
        </tr>
    <? endforeach ?>
    </table>
<? endif ?>
