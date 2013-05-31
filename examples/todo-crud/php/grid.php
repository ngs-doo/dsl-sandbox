<form action="?action=create" method="post" class="form-inline">
    <input type="text" name="task[name]">
    <input type="submit" value="Create" class="btn btn-small">
</form>

<a href="?action=delete_all"><i class="icon icon-plus-sign"></i>Delete all</a>

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
            <a data-async="false" href="?action=update&id=<?=$task->ID?>"><i class="icon icon-pencil"></i></a>
            |
            <a href="?action=delete&id=<?=$task->ID?>"><i class="icon icon-trash"></i></a>
        </td>
    </tr>
<? endforeach ?>
</table>
