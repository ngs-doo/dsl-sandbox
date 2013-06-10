<?php

class Box
{
    public static $dirRoot;

    private $id;

    public function __construct($id)
    {
        $boxDir = self::getDir($id);
        if (!is_dir($boxDir))
            throw new \LogicException('Box dir does not exist. Is the boxes dir writable?');
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public static function create()
    {
        // @todo sth secure and reasonable
        $id = substr(bin2hex(openssl_random_pseudo_bytes(32, $strong=true)), 0, 32);
        $dir = self::getDir($id);
        if(!is_dir($dir))
            mkdir($dir);
        return new Box($id);
    }

    public function writeFiles($files)
    {
        $dir = self::getDir($this->id);
        foreach($files as $filename => $content)
            if (!file_put_contents($dir.'/'.$filename, $content))
                throw new \LogicException('Cannot write php files to box. Is the boxes dir writable?');
        return true;
    }

    public function execute()
    {
        define('BOX_DIR', self::getDir($this->id));
        $initFile  = BOX_DIR.'/_init.php';
        $indexFile = BOX_DIR.'/index.php';

        try {
            ob_start();
            require($initFile);
            require($indexFile);
            $output = ob_get_clean();
            return $output;
        }
        catch (Exception $ex) {
            ob_end_clean();
            // echo ($ex->getTraceAsString());
            // echo ($ex->getMessage());
            return ('Exception in '.$ex->getFile().', line '.$ex->getLine().': '.$ex->getMessage()
                ."\n".'Full trace: '.$ex->getTraceAsString());
        }
    }

    private static function getDir($id)
    {
        return self::$dirRoot.'/'.$id;
    }
}