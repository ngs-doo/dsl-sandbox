<?php

$proxy = NGS\Client\StandardProxy::instance();
$proxy->delete(Blog\Post::findAll());
$proxy->delete(Security\User::findAll());