<?php
$menu = array(
    'Beginner' => array(
        'hello-world' => 'Hello world',
        'simple-crud' => 'Simple CRUD',
        'type-safety' => 'Type safety',
    ),
    'Basics' => array(
        'search' => 'Simple search',
        'blog' => 'Blog',
        'todo-crud' => 'TODO app'
    ),
    'Advanced' => array(
        'olap' => 'OLAP',
        'snapshot' => 'Snapshots',
        'report' => 'Dynamic reports',
    ),
)
?>

<?php  foreach ($menu as $section=>$examples): ?>
    <ul class="nav-list well well-small">
        <li class="nav-header"><?=$section?></li>
    </ul>
<?php      foreach ($examples as $example => $title): ?>
    <ul class="nav-list">
        <li ng-class="{active: box.example=='<?=$example?>'}" class="{active: box.example=='<?=$example?>'}"><a href="#/example/<?=$example?>" ng-click="loadExample('<?=$example?>')"><?=$title?></a></li>
    </ul>
<?php      endforeach ?>
<?php endforeach ?>