<?php
namespace Todo;

require_once __DIR__.'/TaskListArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Todo\TaskList into a JSON string and backwards via an array converter.
 *
 * @package Todo
 * @version 0.9.9 beta
 */
abstract class TaskListJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Todo\TaskList An object or an array of objects of type "Todo\TaskList"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Todo\TaskListArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Todo\TaskListArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Todo\TaskList An object or an array of objects of type "Todo\TaskList"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Todo\TaskListArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}