<?php

class SyntaxLinter
{
    const PHPLINT_OK = 0;
    const PHPLINT_ERROR = 255;

    protected $lastError;

    public function check($code)
    {
        $cmd = 'php -l';

        $descriptorspec = array(
            0 => array("pipe", "r"),  // stdin
            2 => array("pipe", "w"),  // stderr
        );

        $proc = proc_open($cmd, $descriptorspec, $pipes);

        if (!is_resource($proc))
            throw new \LogicException('Cannot run '.$cmd);

        fwrite($pipes[0], $code);
        fclose($pipes[0]);

        $this->lastError = stream_get_contents($pipes[2]);
        fclose($pipes[2]);

        $returnValue = proc_close($proc);

        switch ($returnValue) {
            case self::PHPLINT_OK:
                return true;
                break;
            case self::PHPLINT_ERROR:
                return false;
                break;
            default:
                return false;
        }
    }

    public function getError()
    {
        $rawError = $this->lastError;
        preg_match('/ in - on line (\d+)/', $rawError, $matches);
        // message is not in expected format
        if (!$matches || count($matches) !== 2)
            return array('line' => null, 'message' => $rawError);

        $textToClear = array($matches[0], 'PHP Parse error:  syntax error, ');
        return array(
            'line'    => $matches[1],
            'message' => str_replace($textToClear, '', $rawError),
            'raw'     => $rawError,
        );
    }

    public function getRaw()
    {
        return $this->lastError;
    }
}