<?php
use Library\Book;

echo '<pre>';

$myBook = new Book();
$myBook->title = 'Hamlet';
print_r($myBook);

// Create
$myBook->persist();
print_r($myBook);

// Read
$book = Book::find($myBook->URI);
print_r($book);

// Update
$book->title = 'Hamlet 2';
$book->persist();
print_r($book);

// Delete
$book->delete();

echo '</pre>';
