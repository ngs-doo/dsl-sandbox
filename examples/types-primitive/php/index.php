<?php
use Cinema\Movie;

$movie = new Movie();

$movie->title = 'Lord of the Rings';
$movie->shortTitle = 'LOTR';

$movie->year = 2001;
$movie->durationSeconds = 8100;

$movie->violenceFactor = 4.22;
$movie->loudnessIndex = 0.792;

$movie->under18 = true;

$movie->awards = array('oscar' => 3, 'other' => 'nobel award');

?>
<pre>
<? var_dump($movie); ?>
</pre>

