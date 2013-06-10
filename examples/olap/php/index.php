<?php
use ERP\OrderStats;

$olap = new OrderStats();
$defaultDims = $olap->getDimensions();
$defaultFacts = $olap->getFacts();

$facts = isset($_POST['facts']) ? array_keys($_POST['facts']) : $olap->getFacts();
$dims = isset($_POST['dims']) ? array_keys($_POST['dims']) : $olap->getDimensions();

$rows = $olap->analyze($dims, $facts);

require 'view.php';
