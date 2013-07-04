<?php
namespace Blog;

require_once __DIR__.'/Tag.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Blog\Tag into a simple array and backwards.
 *
 * @package Blog
 * @version 0.9.9 beta
 */
abstract class TagArrayConverter
{/**
     * @param array|\Blog\Tag An object or an array of objects of type "Blog\Tag"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Blog\Tag)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Blog\Tag" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['code'] = $item->code;
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
                if (!$val instanceof \Blog\Tag)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Blog\Tag"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Blog\Tag)
            return $item;
        if (is_array($item))
            return new \Blog\Tag($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "Blog\Tag" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Blog\Tag)
                    $val = new \Blog\Tag($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Blog\Tag"!', 42, $e);
        }

        return $items;
    }
}