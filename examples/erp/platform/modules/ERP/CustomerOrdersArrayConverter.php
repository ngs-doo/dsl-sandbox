<?php
namespace ERP;

require_once __DIR__.'/CustomerOrders.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class ERP\CustomerOrders into a simple array and backwards.
 *
 * @package ERP
 * @version 0.9.9 beta
 */
abstract class CustomerOrdersArrayConverter
{/**
     * @param array|\ERP\CustomerOrders An object or an array of objects of type "ERP\CustomerOrders"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \ERP\CustomerOrders)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "ERP\CustomerOrders" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['ssn'] = $item->ssn;
        $ret['totalOrder'] = $item->totalOrder;
        $ret['customer'] = $item->customer === null ? null : \ERP\CustomerArrayConverter::toArray($item->customer);
        $ret['orders'] = $item->orders === null ? null : \ERP\OrderArrayConverter::toArray($item->orders, false);
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
                if (!$val instanceof \ERP\CustomerOrders)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "ERP\CustomerOrders"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \ERP\CustomerOrders)
            return $item;
        if (is_array($item))
            return new \ERP\CustomerOrders($item);

        throw new \InvalidArgumentException('Argument was not an instance of class "ERP\CustomerOrders" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \ERP\CustomerOrders)
                    $val = new \ERP\CustomerOrders($val);
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "ERP\CustomerOrders"!', 42, $e);
        }

        return $items;
    }
}