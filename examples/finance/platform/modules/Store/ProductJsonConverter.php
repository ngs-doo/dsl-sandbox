<?php
namespace Store;

require_once __DIR__.'/ProductArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Store\Product into a JSON string and backwards via an array converter.
 *
 * @package Store
 * @version 0.9.9 beta
 */
abstract class ProductJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Store\Product An object or an array of objects of type "Store\Product"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Store\ProductArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Store\ProductArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Store\Product An object or an array of objects of type "Store\Product"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Store\ProductArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}