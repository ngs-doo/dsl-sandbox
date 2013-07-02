<?php
namespace Library\BookSearch;

require_once __DIR__.'/findByTitle.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Library\BookSearch\findByTitle into a simple array and backwards.
 *
 * @package Library
 * @version 0.9.9 beta
 */
abstract class findByTitleArrayConverter
{/**
     * @param array|\Library\BookSearch\findByTitle An object or an array of objects of type "Library\BookSearch\findByTitle"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Library\BookSearch\findByTitle)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Library\BookSearch\findByTitle" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['query'] = $item->query;
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
                if (!$val instanceof \Library\BookSearch\findByTitle)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Library\BookSearch\findByTitle"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Library\BookSearch\findByTitle)
            return $item;
        if (is_array($item))
            return new \Library\BookSearch\findByTitle($item);

        throw new \InvalidArgumentException('Argument was not an instance of class "Library\BookSearch\findByTitle" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Library\BookSearch\findByTitle)
                    $val = new \Library\BookSearch\findByTitle($val);
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Library\BookSearch\findByTitle"!', 42, $e);
        }

        return $items;
    }
}