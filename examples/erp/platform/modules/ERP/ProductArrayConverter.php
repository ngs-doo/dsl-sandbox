<?php
namespace ERP;

require_once __DIR__.'/Product.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class ERP\Product into a simple array and backwards.
 *
 * @package ERP
 * @version 0.9.9 beta
 */
abstract class ProductArrayConverter
{/**
     * @param array|\ERP\Product An object or an array of objects of type "ERP\Product"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \ERP\Product)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "ERP\Product" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['ID'] = $item->ID;
        $ret['name'] = $item->name;
        $ret['description'] = $item->description;
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
                if (!$val instanceof \ERP\Product)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "ERP\Product"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \ERP\Product)
            return $item;
        if (is_array($item))
            return new \ERP\Product($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "ERP\Product" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \ERP\Product)
                    $val = new \ERP\Product($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "ERP\Product"!', 42, $e);
        }

        return $items;
    }
}