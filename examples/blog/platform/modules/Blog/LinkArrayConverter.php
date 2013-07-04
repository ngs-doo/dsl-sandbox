<?php
namespace Blog;

require_once __DIR__.'/Link.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Blog\Link into a simple array and backwards.
 *
 * @package Blog
 * @version 0.9.9 beta
 */
abstract class LinkArrayConverter
{/**
     * @param array|\Blog\Link An object or an array of objects of type "Blog\Link"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Blog\Link)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Blog\Link" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['url'] = $item->url;
        $ret['lastUpdated'] = $item->lastUpdated->__toString();
        return $ret;
    }

    private static function toArrayList(array $items, $allowNullValues=false)
    {
        $ret = array();

        foreach($items as $key => $val) {
            if ($allowNullValues && $val===null) {
                $ret[] = null;
            }
            else {
                if (!$val instanceof \Blog\Link)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Blog\Link"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Blog\Link)
            return $item;
        if (is_array($item))
            return new \Blog\Link($item);

        throw new \InvalidArgumentException('Argument was not an instance of class "Blog\Link" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Blog\Link)
                    $val = new \Blog\Link($val);
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Blog\Link"!', 42, $e);
        }

        return $items;
    }
}