<?php

define('SANDBOX_ROOT', realpath('..'));
define('SANDBOX_BOXES', SANDBOX_ROOT.'/sandbox/boxes');

function createBox($files)
{
    // @todo sth secure and reasonable
    $id = substr(bin2hex(openssl_random_pseudo_bytes(32, $strong=true)), 0, 32);

    $dir = SANDBOX_BOXES.'/'.$id;
    if(!is_dir($dir))
        mkdir($dir);
    foreach($files as $filename => $content)
        file_put_contents($dir.'/'.$filename, $content);
    return $id;
}

if (isset($_SERVER['HTTP_SANDBOX_BOX_ID']))
    $boxId = $_SERVER['HTTP_SANDBOX_BOX_ID'];
else
    $boxId = createBox($_POST['files']);

header('Sandbox-Box-Id: '.$boxId);

define('BOX_DIR', SANDBOX_BOXES.'/'.$boxId);
$initFile = BOX_DIR.'/_init.php';
$indexFile = BOX_DIR.'/index.php';

try {
    ob_start();
    require($initFile);
    require($indexFile);
    $output = ob_get_clean();
    echo $output;
}
catch (Exception $ex) {

    ob_end_clean();

    // echo ($ex->getTraceAsString());
    // echo ($ex->getMessage());
 
    echo ('Exception in '.$ex->getFile().', line '.$ex->getLine().': '.$ex->getMessage());
    
    //fail
}
