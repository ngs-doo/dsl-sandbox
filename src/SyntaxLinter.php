<?php

class SyntaxLinter
{
    const PHPLINT_OK = 0;
    const PHPLINT_ERROR = 255;

    protected $lastError;

    public function check($codes)
    {
        if (is_array($codes))
            $code = implode("\n", $codes);
        else
            $code = $codes;

        $phpBin = 'php';
        $cmd = $phpBin.' -l';

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

        \fb::warn($returnValue);

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

    public function getOutput()
    {
        return $this->lastError;
    }
}