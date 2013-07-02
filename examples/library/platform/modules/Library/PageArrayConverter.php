<?php
namespace Library;

require_once __DIR__.'/Page.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Library\Page into a simple array and backwards.
 *
 * @package Library
 * @version 0.9.9 beta
 */
abstract class PageArrayConverter
{/**
     * @param array|\Library\Page An object or an array of objects of type "Library\Page"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Library\Page)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Library\Page" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['content'] = $item->content;
        $ret['notes'] = $item->notes === null ? null : \Library\FootnoteArrayConverter::toArray($item->notes, false);
        $ret['BookID'] = $item->BookID;
        $ret['Index'] = $item->Index;
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
                if (!$val instanceof \Library\Page)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Library\Page"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Library\Page)
            return $item;
        if (is_array($item))
            return new \Library\Page($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "Library\Page" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Library\Page)
                    $val = new \Library\Page($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Library\Page"!', 42, $e);
        }

        return $items;
    }
}