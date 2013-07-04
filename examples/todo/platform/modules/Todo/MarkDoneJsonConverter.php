<?php
namespace Todo;

require_once __DIR__.'/MarkDoneArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Todo\MarkDone into a JSON string and backwards via an array converter.
 *
 * @package Todo
 * @version 0.9.9 beta
 */
abstract class MarkDoneJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Todo\MarkDone An object or an array of objects of type "Todo\MarkDone"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Todo\MarkDoneArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Todo\MarkDoneArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Todo\MarkDone An object or an array of objects of type "Todo\MarkDone"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Todo\MarkDoneArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}