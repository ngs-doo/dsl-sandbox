<?php
namespace Shop;

require_once __DIR__.'/ProductArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Shop\Product into a JSON string and backwards via an array converter.
 *
 * @package Shop
 * @version 0.9.9 beta
 */
abstract class ProductJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Shop\Product An object or an array of objects of type "Shop\Product"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Shop\ProductArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Shop\ProductArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Shop\Product An object or an array of objects of type "Shop\Product"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Shop\ProductArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}