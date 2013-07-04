<?php
namespace CMS;

require_once __DIR__.'/Page.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class CMS\Page into a simple array and backwards.
 *
 * @package CMS
 * @version 0.9.9 beta
 */
abstract class PageArrayConverter
{/**
     * @param array|\CMS\Page An object or an array of objects of type "CMS\Page"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \CMS\Page)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "CMS\Page" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['ID'] = $item->ID;
        $ret['title'] = $item->title;
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
                if (!$val instanceof \CMS\Page)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "CMS\Page"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \CMS\Page)
            return $item;
        if (is_array($item))
            return new \CMS\Page($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "CMS\Page" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \CMS\Page)
                    $val = new \CMS\Page($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "CMS\Page"!', 42, $e);
        }

        return $items;
    }
}