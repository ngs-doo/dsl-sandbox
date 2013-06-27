<?php
namespace Park\Vehicle;

require_once __DIR__.'/hasValidModelLengthArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Park\Vehicle\hasValidModelLength into a JSON string and backwards via an array converter.
 *
 * @package Park
 * @version 0.9.9 beta
 */
abstract class hasValidModelLengthJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Park\Vehicle\hasValidModelLength An object or an array of objects of type "Park\Vehicle\hasValidModelLength"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Park\Vehicle\hasValidModelLengthArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Park\Vehicle\hasValidModelLengthArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Park\Vehicle\hasValidModelLength An object or an array of objects of type "Park\Vehicle\hasValidModelLength"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Park\Vehicle\hasValidModelLengthArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}