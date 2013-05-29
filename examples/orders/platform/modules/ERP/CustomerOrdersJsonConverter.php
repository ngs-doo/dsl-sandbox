<?php
namespace ERP;

require_once __DIR__.'/CustomerOrdersArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class ERP\CustomerOrders into a JSON string and backwards via an array converter.
 *
 * @package ERP
 * @version 0.9.9 beta
 */
abstract class CustomerOrdersJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\ERP\CustomerOrders An object or an array of objects of type "ERP\CustomerOrders"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \ERP\CustomerOrdersArrayConverter::fromArrayList($obj, $allowNullValues)
            : \ERP\CustomerOrdersArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\ERP\CustomerOrders An object or an array of objects of type "ERP\CustomerOrders"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \ERP\CustomerOrdersArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}