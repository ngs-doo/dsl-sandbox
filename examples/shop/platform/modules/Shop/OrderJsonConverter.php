<?php
namespace Shop;

require_once __DIR__.'/OrderArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Shop\Order into a JSON string and backwards via an array converter.
 *
 * @package Shop
 * @version 0.9.9 beta
 */
abstract class OrderJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Shop\Order An object or an array of objects of type "Shop\Order"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Shop\OrderArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Shop\OrderArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Shop\Order An object or an array of objects of type "Shop\Order"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Shop\OrderArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}