<?php
namespace Park;

require_once __DIR__.'/VehicleArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Park\Vehicle into a JSON string and backwards via an array converter.
 *
 * @package Park
 * @version 0.9.9 beta
 */
abstract class VehicleJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Park\Vehicle An object or an array of objects of type "Park\Vehicle"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Park\VehicleArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Park\VehicleArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Park\Vehicle An object or an array of objects of type "Park\Vehicle"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Park\VehicleArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}