<?php
namespace ERP;

require_once __DIR__.'/ProductArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class ERP\Product into a JSON string and backwards via an array converter.
 *
 * @package ERP
 * @version 0.9.9 beta
 */
abstract class ProductJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\ERP\Product An object or an array of objects of type "ERP\Product"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \ERP\ProductArrayConverter::fromArrayList($obj, $allowNullValues)
            : \ERP\ProductArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\ERP\Product An object or an array of objects of type "ERP\Product"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \ERP\ProductArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}