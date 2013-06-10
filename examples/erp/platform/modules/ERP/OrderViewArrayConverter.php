<?php
namespace ERP;

require_once __DIR__.'/OrderView.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class ERP\OrderView into a simple array and backwards.
 *
 * @package ERP
 * @version 0.9.9 beta
 */
abstract class OrderViewArrayConverter
{/**
     * @param array|\ERP\OrderView An object or an array of objects of type "ERP\OrderView"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \ERP\OrderView)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "ERP\OrderView" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['created'] = $item->created->__toString();
        $ret['delivery'] = $item->delivery === null ? null : $item->delivery->__toString();
        $ret['name'] = $item->name;
        $ret['ssn'] = $item->ssn;
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
                if (!$val instanceof \ERP\OrderView)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "ERP\OrderView"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \ERP\OrderView)
            return $item;
        if (is_array($item))
            return new \ERP\OrderView($item);

        throw new \InvalidArgumentException('Argument was not an instance of class "ERP\OrderView" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \ERP\OrderView)
                    $val = new \ERP\OrderView($val);
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "ERP\OrderView"!', 42, $e);
        }

        return $items;
    }
}