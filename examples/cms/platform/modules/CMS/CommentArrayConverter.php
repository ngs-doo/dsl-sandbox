<?php
namespace CMS;

require_once __DIR__.'/Comment.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class CMS\Comment into a simple array and backwards.
 *
 * @package CMS
 * @version 0.9.9 beta
 */
abstract class CommentArrayConverter
{/**
     * @param array|\CMS\Comment An object or an array of objects of type "CMS\Comment"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \CMS\Comment)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "CMS\Comment" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['ID'] = $item->ID;
        $ret['content'] = $item->content;
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
                if (!$val instanceof \CMS\Comment)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "CMS\Comment"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \CMS\Comment)
            return $item;
        if (is_array($item))
            return new \CMS\Comment($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "CMS\Comment" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \CMS\Comment)
                    $val = new \CMS\Comment($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "CMS\Comment"!', 42, $e);
        }

        return $items;
    }
}