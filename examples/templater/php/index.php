<?php
use Todo\Task;
use Todo\Group;
use Todo\Task\findByName;
use NGS\Patterns\Templater;

$group = new Group(array('name' => 'Fixme tasks'));
$group->persist();

for ($i=0; $i<3; $i++) {
    $task = new Task(array(
        'name'     => 'Fixme #'.rand(1000, 3000),
        'priority' => rand(0, 5),
        'group'    => $group));
    $task->persist();
}
// populate template with single Task using its URI
$templater = new Templater('tasklist.txt', 'Todo\Task');
$taskContent = $templater->find($task->URI);

// populate template with specification results
$spec = new findByName(array('query' => 'Fixme'));
$taskList = $templater->search($spec);

?>
Single:
<pre>
    <?=$taskContent;?>
</pre>
<hr>
List:
<pre>
    <?=substr($taskList, 0, 1000); // trim results to 1000 chars ?>
</pre>
