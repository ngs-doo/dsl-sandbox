<?php
namespace Football;

require_once __DIR__.'/TeamArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Football\Team into a JSON string and backwards via an array converter.
 *
 * @package Football
 * @version 0.9.9 beta
 */
abstract class TeamJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Football\Team An object or an array of objects of type "Football\Team"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Football\TeamArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Football\TeamArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Football\Team An object or an array of objects of type "Football\Team"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Football\TeamArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}