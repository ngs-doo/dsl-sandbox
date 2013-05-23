<?
$menu = array(
    'Beginner' => array(
        'hello-world' => 'Hello world',
        'type-safety' => 'Type safety',
        'simple-crud' => 'Simple CRUD',
    ),
    'Basics' => array(
        'search' => 'Simple search',
        'blog' => 'Blog',
    ),
    'Advanced' => array(
        'olap' => 'OLAP',
    ),
)
?>
<ul id="nav-menu" class="nav nav-list">
<?  foreach ($menu as $section=>$examples): ?>
    <li class="nav-header"><?=$section?></li>
<?      foreach ($examples as $example => $title): ?>
    <li ng-class="{active: example=='<?=$example?>'}"><a href="#/example/<?=$example?>" ng-click="loadExample('<?=$example?>')"><?=$title?></a></li>
<?      endforeach ?>
<? endforeach ?>
    
    <li class="divider"></li>

    <li class="nav-header">More DSL platform</li>
    <li><a target="_blank" href="https://dsl-platform.com">Homepage</a></li>
    <li><a target="_blank" href="https://blog.dsl-platform.com">Blog</a></li>
    <li><a target="_blank" href="https://docs.dsl-platform.com">Documentation</a></li>
    <li><a target="_blank" href="https://dsl-platform.com/register">Register</a></li>

</ul>