<?php
use Library\Book;
use Library\BookSearch;
use Library\BookSearch\findByTitle;

$sql = new BookSearch();
$limit = 3;
$rows = $sql->findAll($limit);

$sqlSpec = new findByTitle(array('query'=>'a'));
$sqlSpec->count();

?>
<p>Total rows with title starting with 'a': <?=$sqlSpec->count();?></p>

<div>Total of <?=$sql->count()?> rows.</div>
<div>First 3 rows:</div>
<pre><? var_dump($rows);?></pre>    
