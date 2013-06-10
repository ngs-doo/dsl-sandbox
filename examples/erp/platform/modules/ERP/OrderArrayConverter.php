<?php
namespace ERP;

require_once __DIR__.'/Order.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class ERP\Order into a simple array and backwards.
 *
 * @package ERP
 * @version 0.9.9 beta
 */
abstract class OrderArrayConverter
{/**
     * @param array|\ERP\Order An object or an array of objects of type "ERP\Order"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \ERP\Order)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "ERP\Order" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['ID'] = $item->ID;
        $ret['created'] = $item->created->__toString();
        $ret['delivery'] = $item->delivery === null ? null : $item->delivery->__toString();
        $ret['customerID'] = $item->customerID;
        if($item->customerURI !== null)
            $ret['customerURI'] = $item->customerURI;
        if($item->customer !== null)
            $ret['customer'] = \ERP\CustomerArrayConverter::toArray($item->customer);
        $ret['items'] = \ERP\LineItemArrayConverter::toArray($item->items, false);
        $ret['totalCost'] = $item->totalCost->__toString();
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
                if (!$val instanceof \ERP\Order)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "ERP\Order"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \ERP\Order)
            return $item;
        if (is_array($item))
            return new \ERP\Order($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "ERP\Order" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \ERP\Order)
                    $val = new \ERP\Order($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "ERP\Order"!', 42, $e);
        }

        return $items;
    }
}