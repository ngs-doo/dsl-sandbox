<?php

$boxId = $_GET['box'];
$dir = 'boxes/'.$boxId;

$initFile = $dir.'/_init.php';
$indexFile = $dir.'/index.php';

try {
    ob_start();
    require($initFile);
    require($indexFile);
    $output = ob_get_clean();
    echo $output;
}
catch (Exception $ex) {

    ob_end_clean();
    echo ($ex->getMessage());
    
    //fail
}
