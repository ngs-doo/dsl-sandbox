<?php
namespace ERP;

require_once __DIR__.'/LineItemArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class ERP\LineItem into a JSON string and backwards via an array converter.
 *
 * @package ERP
 * @version 0.9.9 beta
 */
abstract class LineItemJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\ERP\LineItem An object or an array of objects of type "ERP\LineItem"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \ERP\LineItemArrayConverter::fromArrayList($obj, $allowNullValues)
            : \ERP\LineItemArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\ERP\LineItem An object or an array of objects of type "ERP\LineItem"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \ERP\LineItemArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}