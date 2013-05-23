<?php
namespace NGS;

abstract class Dirs
{
    public static $root;
    public static $dsl;
    public static $platform;
    public static $bootstrap;
    public static $modules;
    public static $cache;

    public static function init()
    {
        $dir = preg_replace('/\\\\/u', '/', __DIR__);

        if (!preg_match('/^(.*\\/)platform\\/bootstrap$/u', $dir, $m)) {
            throw new \Exception('Could not initialize root path!');
        }

        self::$root = $m[1];

        self::$dsl = defined('NGS_DSL_PATH')
            ? rtrim(NGS_DSL_PATH, '/').'/'
            : self::$root.'dsl/';

        self::$platform = self::$root.'platform/';
        self::$bootstrap = self::$platform.'bootstrap/';
        self::$modules = self::$platform.'modules/';
        self::$cache = self::$platform.'cache/';
    }

    public static function isEmpty($dir)
    {
        $handle = opendir($dir);
        if ($handle === false) return true;

        return readdir($handle) === false ||
               readdir($handle) === false ||
               readdir($handle) === false;
    }
}

Dirs::init();
