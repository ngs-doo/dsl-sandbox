<?php
namespace Shop;

require_once __DIR__.'/CustomerArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Shop\Customer into a JSON string and backwards via an array converter.
 *
 * @package Shop
 * @version 0.9.9 beta
 */
abstract class CustomerJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Shop\Customer An object or an array of objects of type "Shop\Customer"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Shop\CustomerArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Shop\CustomerArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Shop\Customer An object or an array of objects of type "Shop\Customer"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Shop\CustomerArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}