<?php
use Library\Book;

$books = array();
for($i=0; $i<3; $i++) {
    $book = new Book();
    $book->title = 'Some book '.$i;
    $book->persist();
    $books[] = $book;
}
?>

<ul>
<? foreach($books as $book): ?>
    <li><?=$book->title?>, number assigned by sequence: <strong><?=$book->number?></strong></li>
<? endforeach ?>
</ul>
