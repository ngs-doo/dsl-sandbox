<?php
namespace Blog;

require_once __DIR__.'/UserArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Blog\User into a JSON string and backwards via an array converter.
 *
 * @package Blog
 * @version 0.9.9 beta
 */
abstract class UserJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Blog\User An object or an array of objects of type "Blog\User"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Blog\UserArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Blog\UserArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Blog\User An object or an array of objects of type "Blog\User"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Blog\UserArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}