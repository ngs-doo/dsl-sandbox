<?php
namespace Football;

require_once __DIR__.'/PlayerArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Football\Player into a JSON string and backwards via an array converter.
 *
 * @package Football
 * @version 0.9.9 beta
 */
abstract class PlayerJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Football\Player An object or an array of objects of type "Football\Player"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Football\PlayerArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Football\PlayerArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Football\Player An object or an array of objects of type "Football\Player"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Football\PlayerArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}