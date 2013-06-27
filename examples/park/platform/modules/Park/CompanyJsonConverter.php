<?php
namespace Park;

require_once __DIR__.'/CompanyArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Park\Company into a JSON string and backwards via an array converter.
 *
 * @package Park
 * @version 0.9.9 beta
 */
abstract class CompanyJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\Park\Company An object or an array of objects of type "Park\Company"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \Park\CompanyArrayConverter::fromArrayList($obj, $allowNullValues)
            : \Park\CompanyArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\Park\Company An object or an array of objects of type "Park\Company"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \Park\CompanyArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}