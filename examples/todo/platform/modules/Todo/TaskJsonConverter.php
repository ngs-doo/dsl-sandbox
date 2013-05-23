<?php
namespace Todo;

require_once __DIR__.'/TaskArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Todo\Task into a JSON string and backwards via an array converter.
 *
 * @package Todo
 * @version 0.9.9 beta
 */
abstract class TaskJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Todo\Task An object or an array of objects of type "Todo\Task"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Todo\TaskArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Todo\TaskArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Todo\Task An object or an array of objects of type "Todo\Task"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Todo\TaskArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}