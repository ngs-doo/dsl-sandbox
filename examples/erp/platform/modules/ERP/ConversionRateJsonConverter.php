<?php
namespace ERP;

require_once __DIR__.'/ConversionRateArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class ERP\ConversionRate into a JSON string and backwards via an array converter.
 *
 * @package ERP
 * @version 0.9.9 beta
 */
abstract class ConversionRateJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\ERP\ConversionRate An object or an array of objects of type "ERP\ConversionRate"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \ERP\ConversionRateArrayConverter::fromArrayList($obj, $allowNullValues)
            : \ERP\ConversionRateArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\ERP\ConversionRate An object or an array of objects of type "ERP\ConversionRate"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \ERP\ConversionRateArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}