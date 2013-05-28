<?php
namespace DslBox;

@include_once('FirePHPCore/fb.php');

class SandboxProxy
{
    private $url;
    private $files;
    private $boxId;
    
    private $responseHeader;
    private $responseBody;

    private $headersWhitelist = array(
        'Content-Type',
        'Content-Length',
        'Content-Disposition',
    );

    public function __construct($url, $boxId=null)
    {
        $this->url = $url;
        $this->boxId = $boxId;
    }

    public function add($filename, $content)
    {
        if (!is_string($filename))
            throw new \InvalidArgumentException('Filename must be a string');
        if (!is_string($content))
            throw new \InvalidArgumentException('File content must be a string');
        $this->files[$filename] = $content;
    }

    public function getResponseHeaders()
    {
        $headers = array();
        $lines = explode("\r\n", $this->responseHeader);
        foreach ($lines as $line) {
            $colonPos = strpos($line, ':');
            if ($colonPos===false)
                continue;
            $key = substr($line, 0, $colonPos);
            $value = substr($line, $colonPos+1);
            $headers[$key] = $value;
        }
        return $headers;
    }

    public function getWhitelistResponseHeaders()
    {
        $headers = $this->getResponseHeaders();
        return array_intersect_key($headers, array_flip($this->headersWhitelist));
    }

    public function execute()
    {
        // $output = file_get_contents($this->url.'?box='.$this->id);

        //return $this->passthru();

        return $this->postFiles();
    }

    public function httpGet($queryString=null)
    {
        $curl = curl_init($this->url.($queryString ?: ''));

        $curlOptions = array(
            CURLINFO_HEADER_OUT     => true,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_HEADER          => true,
            CURLOPT_HTTPHEADER      =>  array(
                'Sandbox-Box-Id: '.$this->boxId,
            ),
        );
        curl_setopt_array($curl, $curlOptions);

        $response = curl_exec($curl);
        $responseInfo = curl_getinfo($curl);

        $headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $this->responseHeader = substr($response, 0, $headerSize);
        $this->responseBody   = substr($response, $headerSize);

        return $this->responseBody;
    }

    private function postFiles()
    {
        $curl = curl_init($this->url);

        $postBody = http_build_query(array('files' => $this->files));
        $curlOptions = array(
            CURLINFO_HEADER_OUT     => true,
            CURLOPT_POST            => true,
            CURLOPT_POSTFIELDS      => $postBody,
            CURLOPT_RETURNTRANSFER  => true,
            //CURLOPT_VERBOSE         => true,
            CURLOPT_HEADER          => true,
            CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: '.strlen($postBody)
            ),
        );
        curl_setopt_array($curl, $curlOptions);

        $response = curl_exec($curl);
        $responseInfo = curl_getinfo($curl);

        @include_once('FirePHPCore/fb.php');

        // Then, after your curl_exec call:
        $headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $this->responseHeader = substr($response, 0, $headerSize);
        $this->responseBody   = substr($response, $headerSize);

        return $this->responseBody;
    }
}