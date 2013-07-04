<?php
use Store\Invoice;

$inv = new Invoice();
$inv->number = 123;

$inv->persist();

echo 'Versioned property value: ' . $inv->code;
