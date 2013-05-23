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
    return $dir;
}

$boxDir = createBox($_POST['files']);

$initFile = $boxDir.'/_init.php';
$indexFile = $boxDir.'/index.php';

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
