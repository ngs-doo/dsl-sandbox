<?php
namespace Account;

require_once __DIR__.'/UserArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Account\User into a JSON string and backwards via an array converter.
 *
 * @package Account
 * @version 0.9.9 beta
 */
abstract class UserJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Account\User An object or an array of objects of type "Account\User"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Account\UserArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Account\UserArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Account\User An object or an array of objects of type "Account\User"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Account\UserArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}