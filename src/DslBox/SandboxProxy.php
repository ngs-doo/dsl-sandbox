<?php
namespace DslBox;

class SandboxProxy
{
    private $url;
    private $files;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function add($filename, $content)
    {
        if (!is_string($filename))
            throw new \InvalidArgumentException('Filename must be a string');
        if (!is_string($content))
            throw new \InvalidArgumentException('File content must be a string');
        $this->files[$filename] = $content;
    }

    public function execute()
    {
        // $output = file_get_contents($this->url.'?box='.$this->id);

        return $this->postFiles();
    }

    private function postFiles()
    {
        $curl = curl_init($this->url);

        $postBody = http_build_query(array('files'=>$this->files));
        //$postBody = json_encode(array(
        //    'files' => $this->files,
        //));
        //$postBody = 
//\fb::warn(strlen($postBody));
        $curlOptions = array(
            CURLINFO_HEADER_OUT     => true,
            CURLOPT_POST            => 1,
            CURLOPT_POSTFIELDS      => $postBody,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_HTTPHEADER, array(                                                    
                'Content-Type: application/json',                            
                'Content-Length: '.strlen($postBody)
            ),
        );
        curl_setopt_array($curl, $curlOptions);

        $response = curl_exec($curl);
        $responseInfo = curl_getinfo($curl);

        \fb::log($response);;

        return $response;
    }
}