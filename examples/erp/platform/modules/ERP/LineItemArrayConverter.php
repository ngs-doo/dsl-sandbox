<?php
namespace ERP;

require_once __DIR__.'/LineItem.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class ERP\LineItem into a simple array and backwards.
 *
 * @package ERP
 * @version 0.9.9 beta
 */
abstract class LineItemArrayConverter
{/**
     * @param array|\ERP\LineItem An object or an array of objects of type "ERP\LineItem"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \ERP\LineItem)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "ERP\LineItem" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['productID'] = $item->productID;
        if($item->productURI !== null)
            $ret['productURI'] = $item->productURI;
        if($item->product !== null)
            $ret['product'] = \ERP\ProductArrayConverter::toArray($item->product);
        $ret['quantity'] = $item->quantity->__toString();
        $ret['OrderID'] = $item->OrderID;
        $ret['Index'] = $item->Index;
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
                if (!$val instanceof \ERP\LineItem)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "ERP\LineItem"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \ERP\LineItem)
            return $item;
        if (is_array($item))
            return new \ERP\LineItem($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "ERP\LineItem" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \ERP\LineItem)
                    $val = new \ERP\LineItem($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "ERP\LineItem"!', 42, $e);
        }

        return $items;
    }
}