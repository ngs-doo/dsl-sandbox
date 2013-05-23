<?php
namespace Blog;

require_once __DIR__.'/CommentArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Blog\Comment into a JSON string and backwards via an array converter.
 *
 * @package Blog
 * @version 0.9.9 beta
 */
abstract class CommentJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Blog\Comment An object or an array of objects of type "Blog\Comment"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Blog\CommentArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Blog\CommentArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Blog\Comment An object or an array of objects of type "Blog\Comment"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Blog\CommentArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}