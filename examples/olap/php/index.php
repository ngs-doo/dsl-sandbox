<?php
use ERP\OrderStats;

$olap = new OrderStats();

$allFacts = $olap->getFacts();
$allDims = $olap->getDimensions();
$facts = array();
$dims = array();

if (!$_POST) {
    $facts = $allFacts;
    $dims = $allDims;
} else {
    $facts = array_filter($allFacts, function($key) {
        return isset($_POST['facts'][$key]); } );
    $dims = array_filter($allDims, function($key) {
        return isset($_POST['dims'][$key]); } );
}

$rows = $olap->analyze($dims, $facts);

// pretty format datetime
if (in_array('created', $dims))
    array_walk($rows, function(&$r) {
        $r['created'] = date_create($r['created'])->format('Y-m-d'); } );

require 'view.php';
