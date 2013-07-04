<?php
namespace CMS;

require_once __DIR__.'/Post.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class CMS\Post into a simple array and backwards.
 *
 * @package CMS
 * @version 0.9.9 beta
 */
abstract class PostArrayConverter
{/**
     * @param array|\CMS\Post An object or an array of objects of type "CMS\Post"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \CMS\Post)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "CMS\Post" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['ID'] = $item->ID;
        $ret['title'] = $item->title;
        $ret['content'] = $item->content;
        $ret['publishedOn'] = $item->publishedOn === null ? null : $item->publishedOn->__toString();
        $ret['createdAt'] = $item->createdAt->__toString();
        $ret['modifiedAt'] = $item->modifiedAt->__toString();
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
                if (!$val instanceof \CMS\Post)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "CMS\Post"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \CMS\Post)
            return $item;
        if (is_array($item))
            return new \CMS\Post($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "CMS\Post" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \CMS\Post)
                    $val = new \CMS\Post($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "CMS\Post"!', 42, $e);
        }

        return $items;
    }
}