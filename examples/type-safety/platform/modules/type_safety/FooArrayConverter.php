<?php
namespace type_safety;

require_once __DIR__.'/Foo.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class type_safety\Foo into a simple array and backwards.
 *
 * @package type_safety
 * @version 0.9.9 beta
 */
abstract class FooArrayConverter
{/**
     * @param array|\type_safety\Foo An object or an array of objects of type "type_safety\Foo"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \type_safety\Foo)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "type_safety\Foo" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['ID'] = $item->ID;
        $ret['bar'] = $item->bar;
        return $ret;
    }

    private static function toArrayList(array $items, $allowNullValues=false)
    {
        $ret = array();

        foreach($items as $key => $val) {
            if ($allowNullValues && $val===null) {
                $ret[] = null;
            }
            else {
                if (!$val instanceof \type_safety\Foo)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "type_safety\Foo"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \type_safety\Foo)
            return $item;
        if (is_array($item))
            return new \type_safety\Foo($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "type_safety\Foo" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \type_safety\Foo)
                    $val = new \type_safety\Foo($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "type_safety\Foo"!', 42, $e);
        }

        return $items;
    }
}