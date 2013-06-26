<?php
namespace Park;

require_once __DIR__.'/CurrentStateArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Park\CurrentState into a JSON string and backwards via an array converter.
 *
 * @package Park
 * @version 0.9.9 beta
 */
abstract class CurrentStateJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Park\CurrentState An object or an array of objects of type "Park\CurrentState"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Park\CurrentStateArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Park\CurrentStateArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Park\CurrentState An object or an array of objects of type "Park\CurrentState"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Park\CurrentStateArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}