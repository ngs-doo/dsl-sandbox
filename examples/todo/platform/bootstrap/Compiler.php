<?php
namespace NGS;

require_once Dirs::$bootstrap.'Project.php';
require_once Dirs::$bootstrap.'CommitLog.php';
require_once Dirs::$bootstrap.'Login.php';
require_once Dirs::$bootstrap.'Connector.php';

abstract class Compiler
{
    private static function overwrite(Lister $lister, array $files)
    {
        $log = new CommitLog();

        foreach($lister->bodies as $path => $body) {
            // skip root files except a few predefined ones
            if (!preg_match('/.*\\/.*/u', $path)) {
                if ($path !== 'project.ini' &&
                        $path !== 'README' &&
                        $path !== 'startssl-ca.pem') {
                    $log->skip($path);
                    continue;
                }
            }

            // skip cache files
            if (preg_match('/^cache\\/.*/u', $path)) {
                continue;
            }

            $oldPath = Dirs::$platform.$path;

            if (!isset($files[$path])) {
                $deleted = unlink($oldPath);
                $log->delete($path, $deleted);
            }
            else {
                $newBody = $files[$path];

                $oldSize = $lister->sizes[$path];
                $newSize = strlen($newBody);

                if ($oldSize === $newSize) {
                    $oldHash = $lister->hashes[$path];
                    $newHash = sha1($newBody, true);

                    if ($oldHash === $newHash) {
                        $log->noChange($path);
                        unset($files[$path]);
                        continue;
                    }
                }

                $oldBody = $lister->bodies[$path];
                if (strpos($oldBody, '<?php // DO NOT MANAGE') === 0) {
                    $log->skip($path);
                    unset($files[$path]);
                    continue;
                }

                $wrote = file_put_contents($oldPath, $newBody);
                $ok = $wrote === $newSize;
                $log->replace($path, $ok);
                unset($files[$path]);

                if ($path === 'project.ini') {
                    Project::init();
                }
            }
        }

        foreach($files as $path => $body) {
            $newPath = Dirs::$platform.$path;
            $parent = pathinfo($newPath, PATHINFO_DIRNAME);

            if (!is_dir($parent)) {
                $ok = mkdir($parent, 0777, true);
                $relParent = pathinfo($path, PATHINFO_DIRNAME);
                $log->createDir($relParent, $ok);
            }

            $newSize = strlen($body);
            $wrote = file_put_contents($newPath, $body);
            $ok = $wrote === $newSize;
            $log->create($path, $ok);
        }

        $dirs = array_reverse($lister->dirs);
        foreach($dirs as $dir => $path) {
            if (Dirs::isEmpty($path)) {
                $ok = rmdir($path);
                $log->deleteDir($path, $ok);
            }
        }

        $ok = $log->isAllOk();
        if (!$ok) {
            echo $log;
            throw new \Exception('All actions were not completed successfully!');
        }

        return 'overwrite';
    }

    private static function rebuildPlatform(array $dsls)
    {
        foreach ($dsls as &$v)
            $v = str_replace(array("\r\n", "\r"), "\n", $v);
        ksort($dsls);

        if (Config::$confirmUnsafe) {
            $res = Connector::call($dsls, true);
        } else if (Config::$skipDiff) {
            $res = Connector::call($dsls);
        } else {
            $res = Connector::diff($dsls);

            if ($res['status'] === 201) {
                echo $res['data'];
                return 'diff';
            }

            if ($res['status'] === 200) {
                Config::$skipDiff = true;
                return self::rebuildPlatform($dsls);
            }
        }

        if ($res['status'] === 401 || $res['status'] === 403) {
            Login::showLoginForm($res['data']);
            return false;
        }

        if (strpos($res['data'], 'Since database safe mode is enabled, destructible migration can\'t be performed.') !== false) {
            echo $res['data'], PHP_EOL;
            return 'confirm';
        }

        if ($res['ok'] !== true) {
            echo $res['data'], PHP_EOL;
            exit (255);
        }

        $files = json_decode($res['data'], true);
        if ($files === null) {
            echo $res['data'];
            throw new \Exception('An error has occured whilst retrieving sources!');
        }
        $lister = new Lister(Dirs::$platform);
        return self::overwrite($lister, $files);
    }

    public static function checkRebuild()
    {
        require_once Dirs::$bootstrap.'Lister.php';
        $lister = new Lister(Dirs::$dsl, '.*\\.dsl');
        $newHash = $lister->aggHash;

        require_once Dirs::$bootstrap.'Cache.php';
        $oldHash = Cache::get('dsl-hash');

        if (Config::$ignore) {
            Cache::set ('dsl-hash', $newHash);
        } else if ($newHash !== $oldHash && Config::$rebuild) {
            Login::init();
            $ok = self::rebuildPlatform($lister->bodies);
            if ($ok === 'overwrite')
                Cache::set('dsl-hash', $newHash);

           return $ok;
        }

        return 'allDone';
    }
}
