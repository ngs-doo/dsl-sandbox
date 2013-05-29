<?php

if (isset($_GET['download']))
{
    $report = new ERP\CustomerOrders();
    $report->ssn = '12345-67890';
    $report->totalOrder = 5;

    $ext = $_GET['download']==='pdf' ? 'pdf' : 'docx';
    $content = $ext === 'pdf'
        ? $report->buildReportsPdf()
        : $report->buildReports();

    // download report contents
    header('Content-Disposition: attachment; filename=customer-orders.'.$ext);
    $mimeType = $ext === 'pdf'
        ? 'application/pdf'
        : 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
    header('Content-Type: '.$mimeType);
    header('Content-Length: '.strlen($content));
    echo $content;
    die;
}
else {
    // populate the database with some samples
    require('sample_data.php');
}
?>

<p>Inserted some random data...</p>
<p>Download reports:
    <ul>
        <li><a href="?download=docx" data-async="0">DOCX report</a></li>
        <li><a href="?download=pdf" data-async="0">PDF report</a></li>
    </ul>
</p>
