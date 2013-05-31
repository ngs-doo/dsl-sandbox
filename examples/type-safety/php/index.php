<?php
use type_safety\foo;

$f = new foo();
$f->bar = "a string";

try {
    $f->bar = false;
} catch (InvalidArgumentException $ex) {
    echo $ex->getMessage();
}