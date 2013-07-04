<?php
namespace Blog;

require_once __DIR__.'/LinkArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Blog\Link into a JSON string and backwards via an array converter.
 *
 * @package Blog
 * @version 0.9.9 beta
 */
abstract class LinkJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Blog\Link An object or an array of objects of type "Blog\Link"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Blog\LinkArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Blog\LinkArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Blog\Link An object or an array of objects of type "Blog\Link"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Blog\LinkArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}