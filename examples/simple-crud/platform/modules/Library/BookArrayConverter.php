<?php
namespace Library;

require_once __DIR__.'/Book.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Library\Book into a simple array and backwards.
 *
 * @package Library
 * @version 0.9.9 beta
 */
abstract class BookArrayConverter
{/**
     * @param array|\Library\Book An object or an array of objects of type "Library\Book"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Library\Book)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Library\Book" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['ID'] = $item->ID;
        $ret['title'] = $item->title;
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
                if (!$val instanceof \Library\Book)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Library\Book"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Library\Book)
            return $item;
        if (is_array($item))
            return new \Library\Book($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "Library\Book" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Library\Book)
                    $val = new \Library\Book($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Library\Book"!', 42, $e);
        }

        return $items;
    }
}