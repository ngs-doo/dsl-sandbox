<?php
namespace Shop;

require_once __DIR__.'/Order.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Shop\Order into a simple array and backwards.
 *
 * @package Shop
 * @version 0.9.9 beta
 */
abstract class OrderArrayConverter
{/**
     * @param array|\Shop\Order An object or an array of objects of type "Shop\Order"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Shop\Order)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Shop\Order" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['ID'] = $item->ID;
        $ret['customerID'] = $item->customerID;
        if($item->customerURI !== null)
            $ret['customerURI'] = $item->customerURI;
        $ret['productsURI'] = $item->productsURI;
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
                if (!$val instanceof \Shop\Order)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Shop\Order"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Shop\Order)
            return $item;
        if (is_array($item))
            return new \Shop\Order($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "Shop\Order" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Shop\Order)
                    $val = new \Shop\Order($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Shop\Order"!', 42, $e);
        }

        return $items;
    }
}