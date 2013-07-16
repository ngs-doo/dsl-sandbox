<?php
use Blog\Post;
use Blog\Category;
use Blog\Comment;
use Blog\Tag;
use Blog\Link;
use NGS\Timestamp;

$newsCategory = new Category(array('title'=>'News'));
$newsCategory->persist();

$post = new Post(array('title'=>'Good news everyone!'));

// each root is a standalone object and must first be persisted before being referenced
$post->categories = array($newsCategory);

// non-root references belong to the Post aggregate => they can be persisted
// along with persisting a Post instance
$post->comments = array(
    new Comment(array(
        'email'=>'troll@example.com', 'content'=>'First!!')));

// "Set" eliminates duplicate values
$post->tags = array('good', 'good');    

$post->modifiedOn = array(new Timestamp('now'));

// '?' in Link?[] allows null values in collection
$post->links = array(
    new Link(array('code'=>'good')),
    null);

$post->persist();
?>

<pre>
<?=var_dump($post);?>
</pre>