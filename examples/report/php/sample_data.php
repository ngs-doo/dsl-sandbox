<?php
use ERP\Product;
use ERP\Customer;
use ERP\Order;
use ERP\LineItem;
use NGS\Client\StandardProxy;

// insert some products
$products = array(
    $lsaber     = new Product(array('name' => 'Lightsaber', 'price' => 1499.99)),
    $droid      = new Product(array('name' => 'Farm droid', 'price' => 390)),
    $teleporter = new Product(array('name' => 'Teleporter', 'price' => 700)),
    $phasor     = new Product(array('name' => 'Phasor', 'price' => 450.20)),
);
array_walk($products, function ($it) { $it->persist(); } );

$luke = new Customer();
$luke->name = 'Luke';
$luke->ssn = '12345-67890';
$luke->address = 'Generic desert 21, Tatooine';
$luke->persist();

$order = new Order();
$order->customer = $luke;
$order->items = array(
    new LineItem(array('product' => $droid,  'quantity' => 3)),
    new LineItem(array('product' => $lsaber, 'quantity' => 1)),
);
$order->persist();
