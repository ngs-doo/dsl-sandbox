<?php
require_once('Box.php');

define('SANDBOX_ROOT', realpath('..'));
define('SANDBOX_BOXES', SANDBOX_ROOT.'/sandbox/boxes');

Box::$dirRoot = SANDBOX_BOXES;

$box = isset($_SERVER['HTTP_SANDBOX_BOX_ID']) && $_SERVER['HTTP_SANDBOX_BOX_ID']
    ? new Box($_SERVER['HTTP_SANDBOX_BOX_ID'])
    : Box::create();

if (isset($_SERVER['HTTP_SANDBOX_UPDATE'])) {
    if (isset($_POST['files']))
        if ($box->writeFiles($_POST['files'])) {
            header('Sandbox-Box-Id: '.$box->getId());
            die('ok');
        }
            
}
else {
    header('Sandbox-Box-Id:'.$box->getId());
    echo $box->execute();
}
