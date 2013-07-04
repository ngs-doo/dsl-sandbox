<?php
namespace Store;

require_once __DIR__.'/Invoice.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Store\Invoice into a simple array and backwards.
 *
 * @package Store
 * @version 0.9.9 beta
 */
abstract class InvoiceArrayConverter
{/**
     * @param array|\Store\Invoice An object or an array of objects of type "Store\Invoice"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Store\Invoice)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Store\Invoice" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['ID'] = $item->ID;
        $ret['year'] = $item->year;
        $ret['number'] = $item->number;
        $ret['paid'] = $item->paid === null ? null : $item->paid->__toString();
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
                if (!$val instanceof \Store\Invoice)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Store\Invoice"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Store\Invoice)
            return $item;
        if (is_array($item))
            return new \Store\Invoice($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "Store\Invoice" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Store\Invoice)
                    $val = new \Store\Invoice($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Store\Invoice"!', 42, $e);
        }

        return $items;
    }
}