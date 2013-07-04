<?php
$menu = array(
    'Intro' => array(
        'hello-world' => array(
            'title' => 'Hello world'),
    ),
    'Building blocks' => array(
        'value' => array(
            'title' => 'Value'),
        'entity' => array(
            'title' => 'Entity'),
        'aggregate-root' => array(
            'title' => 'Aggregate root',
            'dsl'   => 'Football.dsl'),
        'types-primitive' => array(
            'title' => 'Primitive types'),
        'types-complex' => array(
            'title' => 'Complex types'),
        'search-spec' => array(
            'title' => 'Simple specification'),
        'search-spec-params' => array(
            'title' => 'Specification with parameters'),
        'search-spec-complex' => array(
            'title' => 'Complex specification'),
        'snowflake' => array(
            'title' => 'Snowflake'),
        'domain-event' => array(
            'title' => 'Domain event'),
        'validation' => array(
            'title' => 'Validation'),
        'report' => array(
            'title' => 'Report'),
    ),
    'Basic concepts' => array(
        'sequence' => array(
            'title' => 'Sequence'),
        'calculated-specification' => array(
            'title' => 'Calculated specification'),
        'calculated-expression' => array(
            'title' => 'Calculated expression'),
        'reference-simple' => array(
            'title' => 'Simple references'),
        'detail' => array(
            'title' => 'Detail'),
        'reference-collections' => array(
            'title' => 'Collections references'),
        'reference-shared' => array(
            'title' => 'Shared references'),
        'type-safety' => array(
            'title' => 'Type safety'),
        'search-generic' => array(
            'title' => 'Generic search'),
    ),
    'Intermediate concepts' => array(
        'templater' => array(
            'title' => 'Templater'),
        'templater-report' => array(
            'title' => 'Templater report'),
        'snapshot' => array(
            'title' => 'Snapshot'),
        'sql' => array(
            'title' => 'SQL'),
        // 'linq' => array(
        //     'title' => 'LINQ'),
        
    ),
    'Advanced concepts' => array(
        'olap' => array(
            'title' => 'OLAP',
            'dsl' => 'olap.dsl'),
    /*    'olap-templater' => array(
            'title' => 'OLAP templater',
            'dsl' => 'olap.dsl'), */
        'history' => array(
            'title' => 'History'),
        'mixin' => array(
            'title' => 'Mixin',
            'dsl'   => 'cms.dsl'),
        'versioning' => array(
            'title' => 'Versioning'),
        'versioning-expression' => array(
            'title' => 'Versioning expression'),
        'index' => array(
            'title' => 'Index'),
        'index-predicate' => array(
            'title' => 'Index with predicate'),
/* @todo
        snapshot za kolekcije
        security filtriranje (uz neku random funkciju)
        async event
*/
    ),
    'Sample apps' => array(
        'simple-crud' => array(
            'title' => 'Simple CRUD'),
        'report-app' => array(
            'title' => 'PDF reports'),
        'todo-crud' => array(
            'title' => 'TODO'),

        // 'blog' => array(
        //     'title' => 'Collections',
        //     'dsl' => 'blog.dsl'),
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
