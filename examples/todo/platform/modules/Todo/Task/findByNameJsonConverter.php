<?php
namespace Todo\Task;

require_once __DIR__.'/findByNameArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Todo\Task\findByName into a JSON string and backwards via an array converter.
 *
 * @package Todo
 * @version 0.9.9 beta
 */
abstract class findByNameJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Todo\Task\findByName An object or an array of objects of type "Todo\Task\findByName"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Todo\Task\findByNameArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Todo\Task\findByNameArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Todo\Task\findByName An object or an array of objects of type "Todo\Task\findByName"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Todo\Task\findByNameArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}