<?php
namespace ERP;

require_once __DIR__.'/OrderArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class ERP\Order into a JSON string and backwards via an array converter.
 *
 * @package ERP
 * @version 0.9.9 beta
 */
abstract class OrderJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\ERP\Order An object or an array of objects of type "ERP\Order"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \ERP\OrderArrayConverter::fromArrayList($obj, $allowNullValues)
            : \ERP\OrderArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\ERP\Order An object or an array of objects of type "ERP\Order"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \ERP\OrderArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}