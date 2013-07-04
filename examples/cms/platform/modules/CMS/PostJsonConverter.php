<?php
namespace CMS;

require_once __DIR__.'/PostArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class CMS\Post into a JSON string and backwards via an array converter.
 *
 * @package CMS
 * @version 0.9.9 beta
 */
abstract class PostJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\CMS\Post An object or an array of objects of type "CMS\Post"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \CMS\PostArrayConverter::fromArrayList($obj, $allowNullValues)
            : \CMS\PostArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\CMS\Post An object or an array of objects of type "CMS\Post"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \CMS\PostArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}