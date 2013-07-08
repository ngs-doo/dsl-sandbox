<?php
use ERP\ConversionRate;

$rate = new ConversionRate();
$rate->from = 'USD';
$rate->to   = 'EUR';
$rate->rate = 0.78;

try {
    $rate->persist();
} catch (Exception $e) {
    echo 'Cannot persist read-only root!';
}

?>

<h4>Existing rates:</h4>
<? foreach(ConversionRate::findAll() as $rate): ?>
<?=$rate->from ?> => <?=$rate->to ?> : <?=$rate->rate?>
<? endforeach ?>