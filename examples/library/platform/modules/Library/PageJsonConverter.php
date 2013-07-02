<?php
namespace Library;

require_once __DIR__.'/PageArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Library\Page into a JSON string and backwards via an array converter.
 *
 * @package Library
 * @version 0.9.9 beta
 */
abstract class PageJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Library\Page An object or an array of objects of type "Library\Page"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Library\PageArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Library\PageArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Library\Page An object or an array of objects of type "Library\Page"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Library\PageArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}