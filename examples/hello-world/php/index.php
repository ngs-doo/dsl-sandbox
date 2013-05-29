<?php

var_dump($_GET);

$book = new Library\Book();
$book->title = 'Hello world!';
?>

<a href="?d=1">click me</a>

<h1><?=$book->title?></h1>