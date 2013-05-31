<?php

// simple file helpers
abstract class Files
{
    public static function getFiles($path, $filter=null) {
        $files = array();
        if (!is_dir($path))
            return array();
        foreach (new DirectoryIterator($path) as $file) {
            if ($file->isDir() && !$file->isDot())
                $files = array_merge($files, self::getFiles($file->getPathName()));
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
                $node['isConverter'] = strpos($item->getFilename(), 'Converter.php') !== false;
            }
            $node['name'] = $item->getFilename();
            $nodes[] = $node;
        }
        return $nodes;
    }

    public static function getSourceFiles($baseDir, $type)
    {
        $dir = $baseDir.'/'.$type;
        if (!is_dir($dir)) {
            throw new LogicException('No '.$type.' folder!');
        }
        $files = self::getFiles($dir, function ($f) use ($type) {
            return $type === pathinfo($f->getFilename(), PATHINFO_EXTENSION);
        });

           // print_r(get_class_methods($f));die; });

            //return $f->getExtension()===$type; } );
        $contents = array();
        foreach($files as $file)
            $contents[] = array('name'=>basename($file), 'content'=>file_get_contents($file));
        return $contents;
    }
}