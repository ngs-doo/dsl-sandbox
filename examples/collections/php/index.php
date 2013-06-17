<?php
use Library\Book;
use Library\Page;
use Library\Footnote;

$book = new Book();

$book->title = 'DSL in 10 minutes';
$book->tags = array('learn', 'DSL', 'DDD');

$book->pages = array(
    new Page(array('content' => 'Foreword')),
    new Page(array('content' => 'First page...')),
    new Page(array('content' => 'Another page...')),
);
