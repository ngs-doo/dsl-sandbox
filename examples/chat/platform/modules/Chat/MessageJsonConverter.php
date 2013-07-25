<?php
namespace Chat;

require_once __DIR__.'/MessageArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Chat\Message into a JSON string and backwards via an array converter.
 *
 * @package Chat
 * @version 0.9.9 beta
 */
abstract class MessageJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Chat\Message An object or an array of objects of type "Chat\Message"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Chat\MessageArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Chat\MessageArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Chat\Message An object or an array of objects of type "Chat\Message"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Chat\MessageArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}