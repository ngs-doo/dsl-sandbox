<?php
use Library\Book;

$book = new Book();
$book->title = 'Hello world!';
?>

<h1><?=$book->title?></h1>