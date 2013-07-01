<?php
use Todo\Task;
use NGS\Patterns\Templater;

$task = new Task(array(
    'name' => 'Fixme #'.rand(1000, 3000),
    'priority' => rand(0, 5),
));
$task->persist();

$templater = new Templater('tasklist.txt', 'Todo\Task');
$content = $templater->find($task->URI);

?>
<pre>
    <?=$content;?>
</pre>

