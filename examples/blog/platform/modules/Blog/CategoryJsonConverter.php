<?php
namespace Blog;

require_once __DIR__.'/CategoryArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Blog\Category into a JSON string and backwards via an array converter.
 *
 * @package Blog
 * @version 0.9.9 beta
 */
abstract class CategoryJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Blog\Category An object or an array of objects of type "Blog\Category"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Blog\CategoryArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Blog\CategoryArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Blog\Category An object or an array of objects of type "Blog\Category"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Blog\CategoryArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}