<?php
namespace ERP;

require_once __DIR__.'/CustomerArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class ERP\Customer into a JSON string and backwards via an array converter.
 *
 * @package ERP
 * @version 0.9.9 beta
 */
abstract class CustomerJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\ERP\Customer An object or an array of objects of type "ERP\Customer"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \ERP\CustomerArrayConverter::fromArrayList($obj, $allowNullValues)
            : \ERP\CustomerArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\ERP\Customer An object or an array of objects of type "ERP\Customer"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \ERP\CustomerArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}