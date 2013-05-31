<?php
use Blog\Post;
use Security\User;
use Blog\Comment;

require('clean.php');

$admin = new User();
$admin->email = 'admin@example.com';
$admin->persist();

$someone = new User(array('email' => 'someone@example.com'));
$someone->persist();

$post = new Post();
$post->title = 'Hello world!';
$post->user = $admin;
$post->comments = array(
    new Comment(array('content' => 'first!', 'user' => $someone)),
    new Comment(array('content' => 'lol noob!', 'user' => $admin)));

$post->persist();

require 'view.php';
