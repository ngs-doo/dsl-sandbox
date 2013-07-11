<?php
use NGS\Patterns\GenericSearch;

$searchPaidIsNull = new GenericSearch('Store\Invoice');
$searchPaidIsNull->eq('paid', null);
$nullCount = $searchPaidIsNull->count();

$searchPaidNotNull = new GenericSearch('Store\Invoice');
$searchPaidNotNull->neq('paid', null);
$notNullCount = $searchPaidNotNull->count();

// this search will use index specified by notPaid specifcation


echo 'Counted '.$nullCount.' null items.';
echo 'Counted '.$notNullCount.' not-null items.';
