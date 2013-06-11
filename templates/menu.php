<?php
$menu = array(
    'Beginner' => array(
        'hello-world' => array(
            'title' => 'Hello world'),
        'simple-crud' => array(
            'title' => 'Simple CRUD'),
        'type-safety' => array(
            'title' => 'Type safety'),
    ),
    'Basics' => array(
        'search' => array(
            'title' => 'Simple search'),
        // 'blog' => array(
        //     'title' => 'Collections',
        //     'defaultDsl' => 'blog.dsl'),
        'todo-crud' => array(
            'title' => 'TODO app')
    ),
    'Advanced' => array(
        'olap' => array(
            'title' => 'OLAP',
            'defaultDsl' => 'olap.dsl'),
        // 'snapshot' => array(
        //     'title' => 'Snapshots'),
        'report' => array(
            'title' => 'Dynamic reports'),
    ),
);
?>

<?php  foreach ($menu as $section=>$examples): ?>
    <ul class="nav-list well well-small">
        <li class="nav-header"><?=$section?></li>
    </ul>
<?php      foreach ($examples as $example => $val):
    $title = $val['title'];
    $defaultDsl = isset($val['defaultDsl']) ? json_encode($val['defaultDsl']) : null;
?>

    <ul class="nav-list">
        <li ng-class="{active: box.example=='<?=$example?>'}" class="{active: box.example=='<?=$example?>'}"><a href="#/example/<?=$example?>" ng-click="loadExample('<?=$example?>', <?=htmlspecialchars(json_encode($val))?>)"><?=$title?></a></li>
    </ul>
<?php      endforeach ?>
<?php endforeach ?>