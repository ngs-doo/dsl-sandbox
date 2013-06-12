<form class="form" action="?action=update&uri=<?=$task->URI?>" method="post" accept-charset="utf-8">
    <label>Task name</label>
    <input type="text" name="task[name]" value="<?=$task->name?>">
    <label>
        <input type="checkbox" name="task[isDone]" <? if($task->isDone): ?>checked="checked"<? endif ?>>
        Completed
    </label>
    <button class="btn" type="submit">Update task</button>
</form>
