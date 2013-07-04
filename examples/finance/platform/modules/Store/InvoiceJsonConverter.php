<?php
namespace Store;

require_once __DIR__.'/InvoiceArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Store\Invoice into a JSON string and backwards via an array converter.
 *
 * @package Store
 * @version 0.9.9 beta
 */
abstract class InvoiceJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Store\Invoice An object or an array of objects of type "Store\Invoice"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Store\InvoiceArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Store\InvoiceArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Store\Invoice An object or an array of objects of type "Store\Invoice"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Store\InvoiceArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}