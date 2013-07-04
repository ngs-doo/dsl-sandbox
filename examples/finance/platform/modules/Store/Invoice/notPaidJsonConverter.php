<?php
namespace Store\Invoice;

require_once __DIR__.'/notPaidArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Store\Invoice\notPaid into a JSON string and backwards via an array converter.
 *
 * @package Store
 * @version 0.9.9 beta
 */
abstract class notPaidJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Store\Invoice\notPaid An object or an array of objects of type "Store\Invoice\notPaid"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Store\Invoice\notPaidArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Store\Invoice\notPaidArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Store\Invoice\notPaid An object or an array of objects of type "Store\Invoice\notPaid"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Store\Invoice\notPaidArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}