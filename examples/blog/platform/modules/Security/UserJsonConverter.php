<?php
namespace Security;

require_once __DIR__.'/UserArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Security\User into a JSON string and backwards via an array converter.
 *
 * @package Security
 * @version 0.9.9 beta
 */
abstract class UserJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Security\User An object or an array of objects of type "Security\User"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Security\UserArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Security\UserArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Security\User An object or an array of objects of type "Security\User"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Security\UserArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}