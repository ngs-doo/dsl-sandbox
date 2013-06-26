<?php
use Cinema\Movie;
use NGS\ByteStream;
use NGS\LocalDate;
use NGS\TimeStamp;
use NGS\BigDecimal;
use NGS\Location;
use NGS\Point;

$movie = new Movie();

$movie->poster = new ByteStream('binary maps to NGS\Bytestream which is internally represented as a string');

// following 2 statements are equivalent
// value is assigned to property through magic setter (__set) method which calls
// the constructor for the property type, LocalDate
$movie->released = new LocalDate('2005-12-31');
$movie->released = '2005-12-31';

// NGS\TimeStamp represents timestamp with timezone
$movie->premiered = '2005-12-25 19:30:00+02:00';

$movie->criticsRating = new BigDecimal('8.54');
$movie->publicRating = '8.7321';

// NGS\Money is rounded up
$movie->budget = 75000.599;

$movie->captions = '<captions>
    <sub><time>01:34</time><content>Hello Frodo!</content></sub>
    <sub><time>01:56</time><content>Hello Gandalf!</content></sub>
    </captions>';

$movie->filmingLocation = new Location(74.0064, 40.7142);

$movie->turningPoint = new Point(360, 42);

?>

<pre>
<? var_dump($movie); ?>
</pre>