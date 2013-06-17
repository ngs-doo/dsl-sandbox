<?php
use ERP\Order;
use ERP\Customer;

// create and save an order with a customer
$customer = new Customer(array('name' => 'John Smith'));
$customer->persist();
$order = new Order(array('customer' => $customer));
$order->persist();

// now update customer's name
$customer->name = 'new name';
$customer->persist();

// load order and check that customer's name remains the same
$order = Order::find($order->URI);
echo 'Customer name saved as snapshot: '.$order->customer->name.'<br>';

// we can use URI in snapshot to get to real customer
$currentCustomer = Customer::find($order->customer->URI);
echo 'Current customer name: '.$currentCustomer->name.'<br>';
