<?php
namespace CMS;

require_once __DIR__.'/PageArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class CMS\Page into a JSON string and backwards via an array converter.
 *
 * @package CMS
 * @version 0.9.9 beta
 */
abstract class PageJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\CMS\Page An object or an array of objects of type "CMS\Page"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \CMS\PageArrayConverter::fromArrayList($obj, $allowNullValues)
            : \CMS\PageArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\CMS\Page An object or an array of objects of type "CMS\Page"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \CMS\PageArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}