<?php
namespace Account;

require_once __DIR__.'/ProfileArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Account\Profile into a JSON string and backwards via an array converter.
 *
 * @package Account
 * @version 0.9.9 beta
 */
abstract class ProfileJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Account\Profile An object or an array of objects of type "Account\Profile"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Account\ProfileArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Account\ProfileArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Account\Profile An object or an array of objects of type "Account\Profile"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Account\ProfileArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}