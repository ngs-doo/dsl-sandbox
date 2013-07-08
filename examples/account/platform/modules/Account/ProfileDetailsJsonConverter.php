<?php
namespace Account;

require_once __DIR__.'/ProfileDetailsArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Account\ProfileDetails into a JSON string and backwards via an array converter.
 *
 * @package Account
 * @version 0.9.9 beta
 */
abstract class ProfileDetailsJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Account\ProfileDetails An object or an array of objects of type "Account\ProfileDetails"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Account\ProfileDetailsArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Account\ProfileDetailsArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Account\ProfileDetails An object or an array of objects of type "Account\ProfileDetails"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Account\ProfileDetailsArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}