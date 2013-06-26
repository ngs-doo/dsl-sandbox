<?php
namespace Park\Vehicle;

require_once __DIR__.'/isMuscleCarArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Park\Vehicle\isMuscleCar into a JSON string and backwards via an array converter.
 *
 * @package Park
 * @version 0.9.9 beta
 */
abstract class isMuscleCarJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Park\Vehicle\isMuscleCar An object or an array of objects of type "Park\Vehicle\isMuscleCar"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Park\Vehicle\isMuscleCarArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Park\Vehicle\isMuscleCarArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Park\Vehicle\isMuscleCar An object or an array of objects of type "Park\Vehicle\isMuscleCar"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Park\Vehicle\isMuscleCarArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}