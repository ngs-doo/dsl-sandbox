<?php
namespace Todo;

require_once __DIR__.'/GroupArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Todo\Group into a JSON string and backwards via an array converter.
 *
 * @package Todo
 * @version 0.9.9 beta
 */
abstract class GroupJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Todo\Group An object or an array of objects of type "Todo\Group"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Todo\GroupArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Todo\GroupArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Todo\Group An object or an array of objects of type "Todo\Group"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Todo\GroupArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}