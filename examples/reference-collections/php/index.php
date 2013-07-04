<?php
use Blog\Post;
use Blog\Category;
use Blog\Comment;
use Blog\Tag;
use Blog\Link;

$newsCategory = new Category(array('title'=>'News'));
$newsCategory->persist();

$post = new Post(array('title'=>'Good news everyone!'));

// root is a standalone object, must be persisted before being referenced
$post->categories = array($newsCategory);

// all other references are objects contained within Post aggregate, so they
// will be persisted along with persisting a Post instance

$post->comments = array(
    new Comment(array(
        'email'=>'troll@example.com', 'content'=>'First!!')));

$post->tags = array(new Tag(array('code'=>'good')));
// '?' after Link properyt allows null values in collection
$post->links = array(
    null,
    new Link(array('code'=>'good')),
    null);

array_push($post->links, new Link(array('code'=>'bad')));

$post->persist();



print_r($post);
