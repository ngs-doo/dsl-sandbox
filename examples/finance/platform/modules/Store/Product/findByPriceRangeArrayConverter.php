<?php
namespace Store\Product;

require_once __DIR__.'/findByPriceRange.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Store\Product\findByPriceRange into a simple array and backwards.
 *
 * @package Store
 * @version 0.9.9 beta
 */
abstract class findByPriceRangeArrayConverter
{/**
     * @param array|\Store\Product\findByPriceRange An object or an array of objects of type "Store\Product\findByPriceRange"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Store\Product\findByPriceRange)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Store\Product\findByPriceRange" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['min'] = $item->min->__toString();
        $ret['max'] = $item->max->__toString();
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
                if (!$val instanceof \Store\Product\findByPriceRange)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Store\Product\findByPriceRange"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Store\Product\findByPriceRange)
            return $item;
        if (is_array($item))
            return new \Store\Product\findByPriceRange($item);

        throw new \InvalidArgumentException('Argument was not an instance of class "Store\Product\findByPriceRange" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Store\Product\findByPriceRange)
                    $val = new \Store\Product\findByPriceRange($val);
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Store\Product\findByPriceRange"!', 42, $e);
        }

        return $items;
    }
}