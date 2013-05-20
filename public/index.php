<?php
require_once __DIR__.'/../vendor/autoload.php';
require_once('FirePHPCore/fb.php');

class MySlim extends Slim\Slim {
    public function fail($message, $statusCode=500) {
        $this->response()->body($message);
        $this->response()->status($statusCode);
        $this->stop();
    }
}

$app = new MySlim(array(
    'templates.path' => __DIR__.'/../templates'
));


function getFiles($path, $filter=null) {
    $files = array();
    foreach (new DirectoryIterator($path) as $file) {
        if ($file->isDir() && !$file->isDot())
            $files = array_merge($files, getFiles($file->getPathName()));
        elseif ($file->isFile() && ($filter===null || call_user_func($filter, $file)))
            $files[] = $path.'/'.$file->getFilename();
    }
    return $files;
}

$app->get('/', function() use ($app) {
    return $app->render('index.php', array());
});

$app->post('/run/:example', function($example) use ($app) {
    $post = json_decode($app->request()->getBody());
    $phpCode = $post->php;

    $dir = '../examples/'.$example;
    if (!is_dir($dir))
        $app->fail('Example not found', 404);

    $sandbox = new DslBox\Sandbox('http://localhost:43001', '../sandbox/boxes');

    $dirBase = realpath('..');
    $dirExample = realpath($dir);

    $initCode = '<?php

require_once \'[[dir]]/vendor/ngs/ngs-php/NGS/Requirements.php\';
require_once \'[[dir_example]]/platform/modules/Modules.php\';
$cfg = parse_ini_file(\'[[dir_example]]/project.ini\');
$client = new \NGS\Client\RestHttp(
    $cfg[\'api-url\'],
    $cfg[\'username\'],
    $cfg[\'project-id\']
);
\NGS\Client\RestHttp::instance($client);
';
    $initCode = str_replace(
        array('[[dir]]', '[[dir_example]]'),
        array($dirBase, $dirExample),
        $initCode);

    $sandbox->beforeExecute($initCode);
    $output = $sandbox->execute($phpCode);

    $res = $app->response();

    $res->header('Content-type', 'application/json');
    $res->body(json_encode(array('output' => $output)));
});

// loads example
$app->get('/example/:example', function($example) use ($app) {

    $baseDir = '../examples/'.$example;
    if(!preg_match('/[a-z0-9_-]+/', $example) || !is_dir($baseDir))
        $app->fail('Example not found', 404);

    $dslFiles = getFiles($baseDir.'/dsl', function ($f) { return $f->getExtension()==='dsl'; } );
    $dslFile = $dslFiles[0];

    $phpModules = array();
    $modulesPath = $baseDir.'/platform/modules';
    foreach (new DirectoryIterator($modulesPath) as $dir) {
        if ($dir->isDir() && !$dir->isDot() && $dir->getFilename() !== 'NGS')
            $phpModules = array_merge($phpModules,
                getFiles($dir->getPathname()));
    }
    array_walk($phpModules, function(&$f) use ($modulesPath) {
            $f = str_replace($modulesPath.'/', '', $f); } );

    $files = array(
        'dsl' => $dslFile,
        'php' => $baseDir.'/main.php',
        'intro' => $baseDir.'/intro.html',
    );
    $result = array_map(function($f) { return is_file($f) ? file_get_contents($f) : ''; }, $files);
    $result['modules'] = $phpModules;

    $app->response()->header('Content-type', 'application/json');
    $app->response()->body(json_encode($result));
});

$app->run();
