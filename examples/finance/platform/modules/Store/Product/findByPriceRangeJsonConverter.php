<?php
namespace Store\Product;

require_once __DIR__.'/findByPriceRangeArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Store\Product\findByPriceRange into a JSON string and backwards via an array converter.
 *
 * @package Store
 * @version 0.9.9 beta
 */
abstract class findByPriceRangeJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Store\Product\findByPriceRange An object or an array of objects of type "Store\Product\findByPriceRange"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Store\Product\findByPriceRangeArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Store\Product\findByPriceRangeArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Store\Product\findByPriceRange An object or an array of objects of type "Store\Product\findByPriceRange"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Store\Product\findByPriceRangeArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}