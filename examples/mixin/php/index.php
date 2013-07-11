<?php
use CMS\Post;
use CMS\Comment;
use CMS\Page;

$post = new Post();
$comment = new Comment();
$page = new Page();

// all objects contain properties included in mixin
foreach(array($post, $comment, $page) as $item) {
	echo  get_class($item).' created at: '.$item->createdAt.'<br />';
}
