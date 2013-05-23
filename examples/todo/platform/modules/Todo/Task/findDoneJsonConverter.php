<?php
namespace Todo\Task;

require_once __DIR__.'/findDoneArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Todo\Task\findDone into a JSON string and backwards via an array converter.
 *
 * @package Todo
 * @version 0.9.9 beta
 */
abstract class findDoneJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Todo\Task\findDone An object or an array of objects of type "Todo\Task\findDone"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Todo\Task\findDoneArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Todo\Task\findDoneArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Todo\Task\findDone An object or an array of objects of type "Todo\Task\findDone"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Todo\Task\findDoneArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}