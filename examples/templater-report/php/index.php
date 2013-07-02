<?php
use ERP\CustomerOrders;

$report = new CustomerOrders();
$report->ssn = '12345-67890';
$report->totalOrder = 5;

$content = $report->buildReportsTxt();

?>

<pre>
    <?=$content ?>
</pre>