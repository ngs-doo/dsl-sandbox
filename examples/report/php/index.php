<?php
use ERP\Customer;
use ERP\CustomerOrders;

// fetch random customer
$customerCount = Customer::count();
$offset = rand(0, $customerCount);
$customer = current(Customer::findAll(1, $offset));

$report = new CustomerOrders();

$report->ssn = $customer->ssn;
$report->totalOrder = 10;

// populates data properties
$report->populate();

?>

Customer with SSN <?=$customer->ssn?> has <?=count($report->orders)?> orders:

<ul>
<? foreach ($report->orders as $order): ?>
    <li><?=$order->totalCost?></li>
<? endforeach ?>
</ul>
