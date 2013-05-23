<?php
namespace NGS;
use NGS\Client\RestHttp;

class Config {
    public static $skipDiff = false;
    public static $confirmUnsafe = false;
    public static $ignore = false;
    public static $html = true;
    public static $rebuild = true;

    public static function init() {
        if (PHP_SAPI !== 'cli')
            self::initHtml();
        else
            self::paramsCLI();
    }

    private static function initHtml()
    {
        $URI = $_SERVER['REQUEST_URI'];

        self::$skipDiff = defined('NGS_UPDATE_SKIP_DIFF') && preg_match(NGS_UPDATE_SKIP_DIFF, $URI);
        self::$skipDiff = self::$skipDiff || array_key_exists('_dsl_platform_confirm_diff', $_POST);

        self::$confirmUnsafe = array_key_exists('_dsl_platform_confirm_unsafe', $_POST);
        self::$rebuild = !defined('NGS_UPDATE') || (NGS_UPDATE != false && preg_match(NGS_UPDATE, $URI));
        self::$ignore = array_key_exists('_dsl_platform_ignore_diff', $_POST);

        self::$html = true;
    }

    private static function paramsCLI()
    {
        $options = getopt(null, array('skip-diff', 'confirm-unsafe'));

        self::$skipDiff = array_key_exists('skip-diff', $options);
        self::$confirmUnsafe = array_key_exists('confirm-unsafe', $options);
        self::$rebuild = true;
        self::$ignore = false;
        self::$html = false;
    }
}

Config::init();

try {
    // Autoload NGS + generated modules
    require_once __DIR__.'/Dirs.php';
    require_once Dirs::$bootstrap.'Project.php';

    function doXtimes($x, $cb) {
        $res = false;
        for ($i = 0; $i < 3 && !$res; $i++) {
            $res = $cb();
        }
        if ($res === false)
            exit (255);

        return $res;
    }

    if (PHP_SAPI === 'cli') {
        require_once Dirs::$bootstrap.'Compiler.php';

        $res = doXtimes(3, function() {
            return Compiler::checkRebuild();
        });

        if ($res === "diff") {
            $tmp = doXtimes(3, function() {
                echo '[C]onfirm / [I]gnore?: ';
                $in = rtrim(fgets(STDIN), "\n\r");
                echo PHP_EOL;

                switch(strtolower($in)) {
                    case 'c':
                        Config::$skipDiff = true;
                        break;

                    case 'i':
                        Config::$ignore = true;
                        break;

                    default:
                        return false;
                }

                return true;
            });
            if ($tmp)
                $res = Compiler::checkRebuild();
        }

        if ($res === 'confirm') {
            $res = doXtimes(3, function () {
                echo 'Confirm [y/n]? ';
                $in = rtrim(fgets(STDIN), "\n\r");
                echo PHP_EOL;

                switch (strtolower($in)) {
                    case 'y':
                        Config::$confirmUnsafe = true;
                        return true;

                    case 'n':
                        exit(0);
                }

                return false;
            });
            if ($res)
                Compiler::checkRebuild();
        }
    }

    else {
        // Recompiles DSL, generates sources
        require_once Dirs::$bootstrap.'Compiler.php';
        $res = Compiler::checkRebuild();

        if ($res === 'diff' || $res === 'confirm')
            exit(0);

        if (Login::needReload()) {
            $redirect = sprintf('Location: %s://%s%s',
                isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https': 'http',
                $_SERVER['HTTP_HOST'],
                $_SERVER['REQUEST_URI']);

            header($redirect);
            exit (0);
        }
    }

    // Loads static platform components
    require_once Dirs::$modules.'NGS/Requirements.php';

    // Loads dynamic platform components
    require_once Dirs::$modules.'Modules.php';

    // Initializes the RestHttp connection
    RestHttp::instance(new RestHttp(
        Project::$apiUrl,
        Project::$username,
        Project::$ID
    ));
} catch (\Exception $e) {
    if (Config::$html)
        \Bootstrap::remotePredefinedError('error', $e->getMessage());
    else
        echo $e->getMessage(), PHP_EOL;

    exit (0);
}
