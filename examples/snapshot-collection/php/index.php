<?php 
use Shop\Product;
use Shop\Customer;
use Shop\Order;

$crowbar = new Product(array('name' => 'Crowbar',    'price' => 20));
$battery = new Product(array('name' => 'Light bulb', 'price' => 1.50));
$crowbar->persist();
$battery->persist();

$johnDoe = new Customer(array('name' => 'John Doe'));
$johnDoe->persist();

$order = new Order();
$order->customer = $johnDoe;
$order->products = array($crowbar, $battery);
$order->persist();

// prices go wild...
$crowbar->price = 1000;
$battery->price = 150;
$crowbar->persist();
$battery->persist();

// order remains the same
// first reload the order
$fetchedOrder = Order::find($order->URI);
?>

<? foreach ($fetchedOrder->products as $prod): ?>
	<?=$prod->name.': '.$prod->price;?><br>
<? endforeach ?>
