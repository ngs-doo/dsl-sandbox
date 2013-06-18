<?php
$menu = array(
    'Beginner' => array(
        'hello-world' => array(
            'title' => 'Hello world'),
    ),
    'Building blocks' => array(
        'aggregate-root' => array(
            'title' => 'Aggregate root',
            'dsl'   => 'Football.dsl'),
        /*
        'entity' => array(
            'title' => 'Entity'),
        'value' => array(
            'title' => 'Value'),
*/      
        'types-primitive' => array(
            'title' => 'Primitive types'),
        'types-complex' => array(
            'title' => 'Complex types'),
        'snowflake' => array(
            'title' => 'Snowflake'),
 /*       'reference' => array(
            'title' => 'References'),
        'collections' => array(
            'title' => 'Collections'),*/
    ),
    'Basic concepts' => array(
        'simple-crud' => array(
            'title' => 'Simple CRUD'),
        'type-safety' => array(
            'title' => 'Type safety'),
        'detail' => array(
            'title' => 'Detail'),
        'sequence' => array(
            'title' => 'Sequence'),
        'search-spec' => array(
            'title' => 'Simple specification'),
        'search-spec-params' => array(
            'title' => 'Specification parameters'),
        'search-spec-complex' => array(
            'title' => 'Complex specification'),
        'search-generic' => array(
            'title' => 'Generic search'),
   /*     'validation' => array(
            'title' => 'Validation'),*/
    ),
        // 'blog' => array(
        //     'title' => 'Collections',
        //     'dsl' => 'blog.dsl'),
    'Advanced concepts' => array(
        'olap' => array(
            'title' => 'OLAP',
            'dsl' => 'olap.dsl'),
        'history' => array(
            'title' => 'History'),
        'snapshot' => array(
            'title' => 'Snapshot'),
    ),
    'Sample apps' => array(
        'report' => array(
            'title' => 'Reports'),
        'todo-crud' => array(
            'title' => 'TODO'),
    ),
);
?>

<?php  foreach ($menu as $section=>$examples): ?>
    <ul class="nav-list well well-small">
        <li class="nav-header"><?=$section?></li>
    </ul>
<?php      foreach ($examples as $example => $val):
    $title = $val['title'];
?>

    <ul class="nav-list">
        <li ng-class="{active: box.example=='<?=$example?>'}" class="{active: box.example=='<?=$example?>'}"><a href="#/example/<?=$example?>" ng-click="loadExample('<?=$example?>', <?=htmlspecialchars(json_encode($val))?>)"><?=$title?></a></li>
    </ul>
<?php      endforeach ?>
<?php endforeach ?>
