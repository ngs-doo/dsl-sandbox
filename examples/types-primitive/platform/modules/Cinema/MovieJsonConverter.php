<?php
namespace Cinema;

require_once __DIR__.'/MovieArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Cinema\Movie into a JSON string and backwards via an array converter.
 *
 * @package Cinema
 * @version 0.9.9 beta
 */
abstract class MovieJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Cinema\Movie An object or an array of objects of type "Cinema\Movie"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Cinema\MovieArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Cinema\MovieArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Cinema\Movie An object or an array of objects of type "Cinema\Movie"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Cinema\MovieArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}