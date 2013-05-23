<?php
namespace Blog;

require_once __DIR__.'/PostArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Blog\Post into a JSON string and backwards via an array converter.
 *
 * @package Blog
 * @version 0.9.9 beta
 */
abstract class PostJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Blog\Post An object or an array of objects of type "Blog\Post"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Blog\PostArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Blog\PostArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Blog\Post An object or an array of objects of type "Blog\Post"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Blog\PostArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}