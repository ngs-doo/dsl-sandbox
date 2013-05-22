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
    <li><a href="#">Introduction</a></li>
    
    <li class="divider"></li>

<?  foreach ($menu as $section=>$examples): ?>
    <li class="nav-header"><?=$section?></li>
<?      foreach ($examples as $example => $title): ?>
    <li><a href="#/example/<?=$example?>" ng-click="loadExample('<?=$example?>')"><?=$title?></a></li>
<?      endforeach ?>
<? endforeach ?>
</ul>