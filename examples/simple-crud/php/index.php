<?php
use Library\Book;

echo '<pre>';

$myBook = new Book();
$myBook->title = 'Hamlet';
var_dump($myBook);

// Create
$myBook->persist();
var_dump($myBook);

// Read
$book = Book::find($myBook->URI);
var_dump($book);

// Update
$book->title = 'Hamlet 2';
$book->persist();
var_dump($book);

// Delete
$book->delete();

echo '</pre>';
