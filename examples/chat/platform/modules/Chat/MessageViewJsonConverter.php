<?php
namespace Chat;

require_once __DIR__.'/MessageViewArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Chat\MessageView into a JSON string and backwards via an array converter.
 *
 * @package Chat
 * @version 0.9.9 beta
 */
abstract class MessageViewJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Chat\MessageView An object or an array of objects of type "Chat\MessageView"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Chat\MessageViewArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Chat\MessageViewArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Chat\MessageView An object or an array of objects of type "Chat\MessageView"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Chat\MessageViewArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}