<?php
use CMS\Post;

$post = new Post();

echo 'persist object a few times without modifiying<br>';
for ($i=0; $i<3; $i++) {
    $post->persist();
    echo $post->modifiedAt.'<br>';
}
echo '<hr>';
echo 'modify object with each persist<br>';
for ($i=0; $i<3; $i++) {
    $post->title = $i;
    $post->persist();
    echo $post->modifiedAt.'<br>';
}

?>