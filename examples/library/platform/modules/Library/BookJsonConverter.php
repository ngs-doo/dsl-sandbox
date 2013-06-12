<?php
namespace Library;

require_once __DIR__.'/BookArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Library\Book into a JSON string and backwards via an array converter.
 *
 * @package Library
 * @version 0.9.9 beta
 */
abstract class BookJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Library\Book An object or an array of objects of type "Library\Book"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Library\BookArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Library\BookArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Library\Book An object or an array of objects of type "Library\Book"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Library\BookArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}