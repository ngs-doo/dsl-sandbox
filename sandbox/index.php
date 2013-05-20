<?php

$boxId = $_GET['box'];
$dir = 'boxes/'.$boxId;

$fileInit = $dir.'/init.php';
$fileCode = $dir.'/code.php';

try {
    ob_start();

    require($fileInit);
    require($fileCode);
    
    $output = ob_get_clean();
    
    echo $output;
}
catch (Exception $ex) {
    ob_end_clean();
    
    //fail
}
