<?php
namespace DslBox;

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

    private static function parseHeaders($header)
    {
        $headers = array();
        $lines = explode("\r\n", $header);
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

    public function getResponseHeaders()
    {
        return self::parseHeaders($this->responseHeader);
    }

    public function getWhitelistResponseHeaders()
    {
        $headers = $this->getResponseHeaders();
        return array_intersect_key($headers, array_flip($this->headersWhitelist));
    }

    public function httpGet($queryString='')
    {
        return $this->execute('GET', $queryString);
    }

    public function execute($method='GET', $queryString='', $data=null)
    {
        $curl = curl_init($this->url.$queryString);

        $method = strtoupper($method);

        $curlOptions = array(
            CURLINFO_HEADER_OUT     => true,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_HEADER          => true,
            CURLOPT_POST            => $method!=='GET',
            CURLOPT_HTTPHEADER      =>  array(
                'Sandbox-Box-Id: '.$this->boxId,
            ),
            /*CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: '.strlen($postBody)
            ),*/
        );

        if ($data && $method!=='GET') {
            $curlOptions[CURLOPT_POSTFIELDS] = $data;
            $curlOptions[CURLOPT_HTTPHEADER][] = 'Content-Length: '.strlen($data);
        }
        curl_setopt_array($curl, $curlOptions);

        $response = curl_exec($curl);

        $headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $this->responseHeader = substr($response, 0, $headerSize);
        $this->responseBody   = substr($response, $headerSize);

        return $this->responseBody;
    }

    public function writeFiles()
    {
        $curl = curl_init($this->url);

        $postBody = http_build_query(array(
            'files' => $this->files,
        ));
        $curlOptions = array(
            CURLINFO_HEADER_OUT     => true,
            CURLOPT_HEADER          => true,
            CURLOPT_POST            => true,
            CURLOPT_POSTFIELDS      => $postBody,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_HTTPHEADER      => array(
                'Sandbox-Box-Id:'.$this->boxId,
                'Sandbox-Update: 1',
            ),
        );

        curl_setopt_array($curl, $curlOptions);

        $response = curl_exec($curl);

        $headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $responseHeader = substr($response, 0, $headerSize);
        $responseBody   = substr($response, $headerSize);

        $headers = self::parseHeaders($responseHeader);

        $this->boxId = $headers['Sandbox-Box-Id'];

        if ($responseBody!=='ok')
            throw new \Exception('Failed to write files to sandbox');
        
        return true;
    }

/*
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
*/
}