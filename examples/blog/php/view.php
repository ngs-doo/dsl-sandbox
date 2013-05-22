<h1><?=$post->title?></h1>
<p><?=$post->content?></p>
<span>comments: </span>
<ul>
<? foreach($post->comments as $comment): ?>
    <li><?=$comment->content?></li>
<? endforeach ?>
