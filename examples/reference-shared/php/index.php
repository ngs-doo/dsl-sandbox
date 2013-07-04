<?php
use Blog\Post;
use Blog\User;
use Blog\Comment;

$post = new Post();
$user = new User();

$comment = new Comment(array(
    'email'   => 'some@example.com',
    'content' => 'Hello post...'));
$post->comments = array($comment);
$post->persist();

// after persisting comment inside Post, comment will be assigned an ID value
// trying to persist that comment inside User object will fail
try {
    $user->comments = $post->comments;
    $user->persist();
} catch (Exception $ex) {
    echo 'Exception caught: Sharing the same instance between Post and User is not allowed';
}

$user->comments = array(
    new Comment(
        array('content'=>'Hello user')));
$user->persist();

?>

<pre>
<?=print_r($post);?>
<?=print_r($user);?>
</pre>