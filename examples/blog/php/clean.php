<?php
use NGS\Client\StandardProxy;
use Blog\Post;
use Security\User;

$proxy = StandardProxy::instance();
$proxy->delete(Post::findAll());
$proxy->delete(User::findAll());