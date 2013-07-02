<?php
namespace Library;

require_once __DIR__.'/FootnoteArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Library\Footnote into a JSON string and backwards via an array converter.
 *
 * @package Library
 * @version 0.9.9 beta
 */
abstract class FootnoteJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Library\Footnote An object or an array of objects of type "Library\Footnote"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Library\FootnoteArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Library\FootnoteArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Library\Footnote An object or an array of objects of type "Library\Footnote"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Library\FootnoteArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}