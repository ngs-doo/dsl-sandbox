<?php
namespace Park;

require_once __DIR__.'/EngineArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Park\Engine into a JSON string and backwards via an array converter.
 *
 * @package Park
 * @version 0.9.9 beta
 */
abstract class EngineJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Park\Engine An object or an array of objects of type "Park\Engine"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Park\EngineArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Park\EngineArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Park\Engine An object or an array of objects of type "Park\Engine"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Park\EngineArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}