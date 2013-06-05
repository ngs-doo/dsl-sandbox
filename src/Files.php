<?php

// simple file helpers
abstract class Files
{
    public static function filter($path, $filter=null) {
        $files = array();
        if (!is_dir($path))
            return array();
        foreach (new DirectoryIterator($path) as $file) {
            if ($file->isDir() && !$file->isDot())
                $files = array_merge($files, self::filter($file->getPathName()));
            elseif ($file->isFile() && ($filter===null || call_user_func($filter, $file)))
                $files[] = $path.'/'.$file->getFilename();
        }
        return $files;
    }

    public static function getFileTree($path)
    {
        $nodes = array();
        foreach (new DirectoryIterator($path) as $item) {
            if ($item->isDot() || $item->getFilename() === 'NGS')
                continue;
            $node = array();
            if ($item->isDir()) {
                $node['isDir'] = true;
                $node['nodes'] = self::getFileTree($item->getPathname());
            } elseif ($item->isFile()) {
                $node['isFile'] = true;
                $node['path'] = $item->getPath();
                $node['isConverter'] = strpos($item->getFilename(), 'Converter.php') !== false;
            }
            $node['name'] = $item->getFilename();
            $nodes[] = $node;
        }
        return $nodes;
    }

    public static function byExt($baseDir, $type)
    {
        $dir = $baseDir.'/'.$type;
        if (!is_dir($dir)) {
            throw new LogicException('No '.$type.' folder!');
        }
        $files = self::filter($dir, function ($f) use ($type) {
            return $type === pathinfo($f->getFilename(), PATHINFO_EXTENSION);
        });
        $contents = array();
        foreach($files as $file)
            $contents[] = array('name'=>basename($file), 'content'=>file_get_contents($file));
        return $contents;
    }
}