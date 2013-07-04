<?php
use Store\Product;
use Store\Product\findByPriceRange;

for ($i=0; $i<3; $i++) {
    $p = new Product();
    $p->name = uniqid('', true);
    $p->price = rand(1,2000);
    $p->persist();
}

$spec = new findByPriceRange(array('min'=>100, 'max'=>1000));

printf('Total products found: %d', $spec->count());
