<?php
namespace type_safety;

require_once __DIR__.'/FooArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class type_safety\Foo into a JSON string and backwards via an array converter.
 *
 * @package type_safety
 * @version 0.9.9 beta
 */
abstract class FooJsonConverter
{/**
     * @param string Json representation of the object(s)
     *
     * @return array|\type_safety\Foo An object or an array of objects of type "type_safety\Foo"
     */
    public static function fromJson($item, $allowNullValues=false)
    {
        $obj = json_decode($item, true);

        return \NGS\Utils::isJsonArray($item)
            ? \type_safety\FooArrayConverter::fromArrayList($obj, $allowNullValues)
            : \type_safety\FooArrayConverter::fromArray($obj);
    }

    /**
     * @param array|\type_safety\Foo An object or an array of objects of type "type_safety\Foo"
     *
     * @return string Json representation of the object(s)
     */
    public static function toJson($item)
    {
        $arr = \type_safety\FooArrayConverter::toArray($item);
        if(is_array($item))
            return json_encode($arr);
        if(empty($arr))
            return '{}';
        return json_encode($arr);
    }
}