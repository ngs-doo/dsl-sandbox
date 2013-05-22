<?php
require('clean.php');

$admin = new Security\User();
$admin->email = 'admin@example.com';
$admin->persist();

$someone = new Security\User(array('email' => 'someone@example.com'));
$someone->persist();

$post = new Blog\Post();
$post->title = 'Hello world!';
$post->user = $admin;
$post->comments = array(
    new Blog\Comment(array('content' => 'first!', 'user' => $someone)),
    new Blog\Comment(array('content' => 'lol noob!', 'user' => $admin)));

$post->persist();

require 'view.php';
