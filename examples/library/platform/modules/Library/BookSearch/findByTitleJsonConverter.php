<?php
namespace Library\BookSearch;

require_once __DIR__.'/findByTitleArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Library\BookSearch\findByTitle into a JSON string and backwards via an array converter.
 *
 * @package Library
 * @version 0.9.9 beta
 */
abstract class findByTitleJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Library\BookSearch\findByTitle An object or an array of objects of type "Library\BookSearch\findByTitle"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Library\BookSearch\findByTitleArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Library\BookSearch\findByTitleArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Library\BookSearch\findByTitle An object or an array of objects of type "Library\BookSearch\findByTitle"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Library\BookSearch\findByTitleArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}