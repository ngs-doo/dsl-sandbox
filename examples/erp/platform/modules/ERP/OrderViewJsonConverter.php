<?php
namespace ERP;

require_once __DIR__.'/OrderViewArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class ERP\OrderView into a JSON string and backwards via an array converter.
 *
 * @package ERP
 * @version 0.9.9 beta
 */
abstract class OrderViewJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\ERP\OrderView An object or an array of objects of type "ERP\OrderView"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \ERP\OrderViewArrayConverter::fromArrayList($obj, $allowNullValues)
            : \ERP\OrderViewArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\ERP\OrderView An object or an array of objects of type "ERP\OrderView"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \ERP\OrderViewArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}