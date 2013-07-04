<?php
namespace Blog;

require_once __DIR__.'/TagArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Blog\Tag into a JSON string and backwards via an array converter.
 *
 * @package Blog
 * @version 0.9.9 beta
 */
abstract class TagJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Blog\Tag An object or an array of objects of type "Blog\Tag"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Blog\TagArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Blog\TagArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Blog\Tag An object or an array of objects of type "Blog\Tag"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Blog\TagArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}