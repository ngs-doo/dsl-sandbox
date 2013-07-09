<?php
namespace Shop;

require_once __DIR__.'/Customer.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Shop\Customer into a simple array and backwards.
 *
 * @package Shop
 * @version 0.9.9 beta
 */
abstract class CustomerArrayConverter
{/**
     * @param array|\Shop\Customer An object or an array of objects of type "Shop\Customer"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Shop\Customer)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Shop\Customer" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['ID'] = $item->ID;
        $ret['name'] = $item->name;
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
                if (!$val instanceof \Shop\Customer)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Shop\Customer"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Shop\Customer)
            return $item;
        if (is_array($item))
            return new \Shop\Customer($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "Shop\Customer" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Shop\Customer)
                    $val = new \Shop\Customer($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Shop\Customer"!', 42, $e);
        }

        return $items;
    }
}