<?php
namespace Chat;

require_once __DIR__.'/UserArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Chat\User into a JSON string and backwards via an array converter.
 *
 * @package Chat
 * @version 0.9.9 beta
 */
abstract class UserJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Chat\User An object or an array of objects of type "Chat\User"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Chat\UserArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Chat\UserArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Chat\User An object or an array of objects of type "Chat\User"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Chat\UserArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}