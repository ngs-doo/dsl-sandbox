<?php
namespace Todo\Task;

require_once __DIR__.'/findRecentArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Todo\Task\findRecent into a JSON string and backwards via an array converter.
 *
 * @package Todo
 * @version 0.9.9 beta
 */
abstract class findRecentJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Todo\Task\findRecent An object or an array of objects of type "Todo\Task\findRecent"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Todo\Task\findRecentArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Todo\Task\findRecentArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Todo\Task\findRecent An object or an array of objects of type "Todo\Task\findRecent"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Todo\Task\findRecentArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}