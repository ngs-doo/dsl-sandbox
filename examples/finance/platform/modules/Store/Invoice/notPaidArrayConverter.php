<?php
namespace Store\Invoice;

require_once __DIR__.'/notPaid.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Store\Invoice\notPaid into a simple array and backwards.
 *
 * @package Store
 * @version 0.9.9 beta
 */
abstract class notPaidArrayConverter
{/**
     * @param array|\Store\Invoice\notPaid An object or an array of objects of type "Store\Invoice\notPaid"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Store\Invoice\notPaid)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Store\Invoice\notPaid" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
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
                if (!$val instanceof \Store\Invoice\notPaid)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Store\Invoice\notPaid"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Store\Invoice\notPaid)
            return $item;
        if (is_array($item))
            return new \Store\Invoice\notPaid($item);

        throw new \InvalidArgumentException('Argument was not an instance of class "Store\Invoice\notPaid" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Store\Invoice\notPaid)
                    $val = new \Store\Invoice\notPaid($val);
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Store\Invoice\notPaid"!', 42, $e);
        }

        return $items;
    }
}