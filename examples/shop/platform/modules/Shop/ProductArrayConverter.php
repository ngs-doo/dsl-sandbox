<?php
namespace Shop;

require_once __DIR__.'/Product.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Shop\Product into a simple array and backwards.
 *
 * @package Shop
 * @version 0.9.9 beta
 */
abstract class ProductArrayConverter
{/**
     * @param array|\Shop\Product An object or an array of objects of type "Shop\Product"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Shop\Product)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Shop\Product" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['ID'] = $item->ID;
        $ret['name'] = $item->name;
        $ret['price'] = $item->price->__toString();
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
                if (!$val instanceof \Shop\Product)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Shop\Product"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Shop\Product)
            return $item;
        if (is_array($item))
            return new \Shop\Product($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "Shop\Product" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Shop\Product)
                    $val = new \Shop\Product($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Shop\Product"!', 42, $e);
        }

        return $items;
    }
}