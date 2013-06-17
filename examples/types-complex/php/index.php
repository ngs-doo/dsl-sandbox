<?php
use Cinema\Movie;
use NGS\ByteStream;
use NGS\LocalDate;
use NGS\TimeStamp;
use NGS\BigDecimal;

$movie = new Movie();

$movie->poster = new ByteStream('binary maps to NGS\Bytestream which is internally represented as a string');

// following 2 statements are equivalent
$movie->released = new LocalDate('2005-12-31');
$movie->released = '2005-12-31';    // __set method will call LocalDate constructor

// NGS\TimeStamp represents timestamp with timezone
$movie->premiered = '2005-12-25 19:30:00+02:00';

$movie->criticsRating = new BigDecimal('8.54');
$movie->publicRating = '8.7321';

$movie->budget = '75000000';

$movie->captions = '<captions>
    <sub><time>01:34</time><content>Hello Frodo!</content></sub>
    <sub><time>01:56</time><content>Hello Gandalf!</content></sub>
    </captions>';
?>

<pre>
<? var_dump($movie); ?>
</pre>