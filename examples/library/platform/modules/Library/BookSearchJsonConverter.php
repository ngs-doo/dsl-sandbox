<?php
namespace Library;

require_once __DIR__.'/BookSearchArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Library\BookSearch into a JSON string and backwards via an array converter.
 *
 * @package Library
 * @version 0.9.9 beta
 */
abstract class BookSearchJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Library\BookSearch An object or an array of objects of type "Library\BookSearch"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Library\BookSearchArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Library\BookSearchArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Library\BookSearch An object or an array of objects of type "Library\BookSearch"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Library\BookSearchArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}