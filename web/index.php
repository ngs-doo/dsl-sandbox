<?php
require_once __DIR__.'/../vendor/autoload.php';

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

$app->get('/', function() use ($app) {
    return $app->render('index.php', array());
});


$app->post('/run/:example', function($example) use ($app) {
    $req = $app->request();
    $res = $app->response();

    $res->header('Content-type', 'application/json');

    $phpFiles = $req->post('php');
    if (!is_array($phpFiles))
        $app->fail('No php code in post data');

    foreach($phpFiles as $file) {
        if (!isset($file['name']) || !is_string($file['name'])
            || !isset($file['content']) || !is_string($file['content']))
            $app->fail('Invalid value in php input!');
    }

    $dir = '../examples/'.$example;
    if (!is_dir($dir))
        $app->fail('Example not found', 404);

    $initCode = '<?php

require_once SANDBOX_ROOT.\'/vendor/ngs/ngs-php-core/NGS/Requirements.php\';
require_once SANDBOX_ROOT.\'/examples/[[example]]/platform/modules/Modules.php\';
$cfg = parse_ini_file(SANDBOX_ROOT.\'/examples/[[example]]/platform/project.ini\');
$client = new \NGS\Client\RestHttp(
    $cfg[\'api-url\'],
    $cfg[\'username\'],
    $cfg[\'project-id\']
);
\NGS\Client\RestHttp::instance($client);
?>';
    $initCode = str_replace('[[example]]', $example, $initCode);

    $linter = new SyntaxLinter();
    $syntaxErrors = array();
    foreach ($phpFiles as $file) {
        if(!$linter->check($file['content'])) {
            $error = $linter->getError();
            $error['file'] = $file['name'];
            $syntaxErrors[] = $error;
        }
    }
    if($syntaxErrors)
        return $res->body(json_encode(array(
            'syntax' => false,
            'syntaxErrors' => $syntaxErrors)));

    $sandboxProxy = new DslBox\SandboxProxy('http://localhost:43001');
    foreach ($phpFiles as $file)
        $sandboxProxy->add($file['name'], $file['content']);
    $sandboxProxy->add('_init.php', $initCode);
    $sandboxProxy->writeFiles();


    $method      = $req->post('method') ?: 'GET';
    $queryString = $req->post('url') ?: '';
    $postData    = $req->post('data');

    $output = $sandboxProxy->execute($method, $queryString, $postData);

    $headers = $sandboxProxy->getWhitelistResponseHeaders();
    $headers = $sandboxProxy->getResponseHeaders();

    $result = array('output' => $output);
    if(isset($headers['Sandbox-Box-Id']))
        $result['boxId'] = $headers['Sandbox-Box-Id'];
    $res->body(json_encode($result));
});

// passthru to sandbox, useful for direct downloads from php output
$app->get('/run/:example', function($example) use ($app) {
    $res = $app->response();

    $dir = '../examples/'.$example;
    if (!is_dir($dir))
        $app->fail('Example not found', 404);

    if(!isset($_GET['boxId']))
        $app->fail('No boxId param');
    $boxId = $_GET['boxId'];
    $sandboxProxy = new DslBox\SandboxProxy('http://localhost:43001', $boxId);
    
    $query = isset($_GET['query']) ? $_GET['query'] : null;
    
    $output = $sandboxProxy->httpGet($query);

    $headers = $sandboxProxy->getWhitelistResponseHeaders();
    $headers = $sandboxProxy->getResponseHeaders();

    // passthru
    foreach($headers as $key=>$value)
        $res->header($key, $value);
    $res->body($output);
});

// loads example
$app->get('/example/:example', function($example) use ($app) {
    $baseDir = '../examples/'.$example;
    if(!preg_match('/[a-z0-9_-]+/', $example) || !is_dir($baseDir))
        $app->fail('Example not found', 404);

    $modulesDir = $baseDir.'/platform/modules';
    if (!is_dir($modulesDir))
        $app->fail('Modules dir not found! '.$modulesDir);
    
    $intro = $baseDir.'/intro.html';
    $result = array();
    try {
        $result['intro']   = is_file($intro) ? file_get_contents($intro) : '';
        $result['modules'] = Files::getFileTree($modulesDir);
        $result['dsl']     = Files::byExt($baseDir, 'dsl');
        if(is_dir($baseDir.'/cs'))
            $result['dsl'] = array_merge($result['dsl'], Files::byExt($baseDir, 'cs'));
        $result['php']     = Files::byExt($baseDir, 'php');
        $result['uploads'] = Files::filter($baseDir.'/uploads');
    } catch (Exception $ex) {
        //$app->fail($ex->getFile().', line '.$ex->getLine().': '.$ex->getMessage());
        $app->fail($ex->getTraceAsString());
    }

    $app->response()->header('Content-type', 'application/json');
    $app->response()->body(json_encode($result));
});

// download a file from example
$app->get('/file', function() use ($app) {
    $example = $app->request()->get('example');
    $relPath = $app->request()->get('path');
    $path = realpath('../examples/'.$example.'/platform/modules/'.$relPath);

    // allows download of _any_ file in /examples
    if(strpos($path, realpath('../examples')) !== 0)
        $app->fail('Invalid path: '.$path);

    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $filename = pathinfo($path, PATHINFO_FILENAME);
    $content = file_get_contents($path);

    $res = $app->response();
    if ($ext === 'php') $mime = 'application/x-php';
    elseif ($ext === 'docx') $mime = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
    if (isset($mime))
        $res->header('Content-Type', $mime);
    $res->header('Content-Disposition', 'attachment; filename='.$filename);
    $res->header('Content-Length', strlen($content));
    $res->body(file_get_contents($path));
});

$app->run();
