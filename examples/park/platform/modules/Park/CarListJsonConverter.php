<?php
namespace Park;

require_once __DIR__.'/CarListArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Park\CarList into a JSON string and backwards via an array converter.
 *
 * @package Park
 * @version 0.9.9 beta
 */
abstract class CarListJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Park\CarList An object or an array of objects of type "Park\CarList"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Park\CarListArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Park\CarListArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Park\CarList An object or an array of objects of type "Park\CarList"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Park\CarListArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}