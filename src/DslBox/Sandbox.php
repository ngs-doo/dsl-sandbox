<?php
namespace DslBox;

/**
 * Executes php code in a sandbox environment
 */
class Sandbox
{
    private $id;
    private $url;
    private $boxesDir;
    private $files;

    private function init()
    {
        // @todo sth secure and reasonable
        $this->id = substr(bin2hex(openssl_random_pseudo_bytes(32, $strong=true)), 0, 32);

        $dir = $this->boxesDir.'/'.$this->id;
        if(!is_dir($dir))
            mkdir($dir);
        foreach($this->files as $filename => $content)
            file_put_contents($dir.'/'.$filename, $content);
    }

    public function __construct($url, $boxesDir)
    {
        $this->url = $url;
        $this->boxesDir = $boxesDir;
    }

    public function add($filename, $content)
    {
        if (!is_string($filename))
            throw new \InvalidArgumentException('Filename must be a string');
        if (!is_string($content))
            throw new \InvalidArgumentException('File content must be a string');
        $this->files[$filename] = $content;
    }

    public function getId()
    {
        return $this->id;
    }

    public function beforeExecute($code)
    {
        $this->beforeExecute = $code;
    }

    public function execute()
    {
        $this->init();
        $output = file_get_contents($this->url.'?box='.$this->id);
        return $output;
    }
}