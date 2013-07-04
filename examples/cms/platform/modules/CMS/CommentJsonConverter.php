<?php
namespace CMS;

require_once __DIR__.'/CommentArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class CMS\Comment into a JSON string and backwards via an array converter.
 *
 * @package CMS
 * @version 0.9.9 beta
 */
abstract class CommentJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\CMS\Comment An object or an array of objects of type "CMS\Comment"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \CMS\CommentArrayConverter::fromArrayList($obj, $allowNullValues)
            : \CMS\CommentArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\CMS\Comment An object or an array of objects of type "CMS\Comment"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \CMS\CommentArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}