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
        'versioning' => array(
            'title' => 'Versioning'),
        'index' => array(
            'title' => 'Index'),
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
        'versioning-expression' => array(
            'title' => 'Versioning expression'),
        'index-predicate' => array(
            'title' => 'Index with predicate'),
        'relationship' => array(
            'title' => 'Relationship'),
        /*'read-only' => array(
            'title' => 'Read-only',
        ),*/
        'snapshot-collection' => array(
            'title' => 'Snapshot collection'),
    ),
    'Sample apps' => array(
        'simple-crud' => array(
            'title' => 'Simple CRUD'),
        'report-app' => array(
            'title' => 'PDF reports'),
        'chat-app' => array(
            'title' => 'Real-time chat'),
        'todo-crud' => array(
            'title' => 'TODO app'),
    ),
);
?>

<div id="left-menu">
<?php  foreach ($menu as $section=>$examples): ?>
    <div>
<? $domId = str_replace(' ', '-', strtolower($section)); ?>
        <ul class="nav-list well well-small">
            <li class="nav-header accordion-toggle js-collapse-toggle" data-toggle="collapse" data-target="#<?=$domId?>">
                <span class="nav-menu-item"><?=$section?></span>
                <span class="right-10">
                    <?php if ($domId === "intro"): ?><i class="icon-chevron-up icon-small"></i><?php else: ?><i class="icon-chevron-down icon-small"></i><?php endif ?>
                </span>
            </li>
        </ul>
        <div class="accordion-body collapse <?php if ($domId === "intro"): ?>in<?php endif ?>" id="<?=$domId?>">
            <ul class="nav-list">
<?php      foreach ($examples as $example => $val):
    $title = $val['title'];
?>
                <li ng-class="{active: box.example=='<?=$example?>'}" class="{active: box.example=='<?=$example?>'}"><a href="#/example/<?=$example?>" ng-click="loadExample('<?=$example?>', <?=htmlspecialchars(json_encode($val))?>)"><?=$title?></a></li>
<?php      endforeach ?>
            </ul>
        </div>
    </div>
<?php endforeach ?>
</div>
