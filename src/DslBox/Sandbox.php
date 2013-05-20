<?php
namespace DslBox;

class Sandbox
{
    private $id;
    private $url;
    private $beforeExecute;
    private $boxesDir;

    private function init($code)
    {
        // @todo sth secure and reasonable
        $this->id = substr(bin2hex(openssl_random_pseudo_bytes(32, $strong=true)), 0, 32);

        $dir = $this->boxesDir.'/'.$this->id;

        if(!is_dir($dir))
            mkdir($dir);

        file_put_contents($dir.'/init.php', $this->beforeExecute);
        file_put_contents($dir.'/code.php', $code);
    }

    public function __construct($url, $boxesDir)
    {
        $this->url = $url;
        $this->boxesDir = $boxesDir;
    }

    public function getId()
    {
        return $this->id;
    }

    public function beforeExecute($code)
    {
        $this->beforeExecute = $code;
    }

    public function execute($code)
    {
        $this->init($code);

        $output = file_get_contents($this->url.'?box='.$this->id);

        return $output;
    }
}