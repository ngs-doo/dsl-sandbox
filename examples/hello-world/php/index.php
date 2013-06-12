<?php
use Library\Book;

$title = 'world';

if (isset($_POST['title']))
    $title = $_POST['title'];

$book = new Book();
$book->title = 'Hello '.$title.'!';
?>

<h3><?=$book->title?></h3>

<form method="POST">
    <input class="input-medium" type="text" name="title" placeholder="enter something">
    <button class="btn" type="submit">Say hello!</button>
</form>
