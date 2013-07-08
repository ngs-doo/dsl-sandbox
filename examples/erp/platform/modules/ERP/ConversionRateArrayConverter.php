<?php
namespace ERP;

require_once __DIR__.'/ConversionRate.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class ERP\ConversionRate into a simple array and backwards.
 *
 * @package ERP
 * @version 0.9.9 beta
 */
abstract class ConversionRateArrayConverter
{/**
     * @param array|\ERP\ConversionRate An object or an array of objects of type "ERP\ConversionRate"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \ERP\ConversionRate)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "ERP\ConversionRate" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['ID'] = $item->ID;
        $ret['from'] = $item->from;
        $ret['to'] = $item->to;
        $ret['rate'] = $item->rate;
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
                if (!$val instanceof \ERP\ConversionRate)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "ERP\ConversionRate"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \ERP\ConversionRate)
            return $item;
        if (is_array($item))
            return new \ERP\ConversionRate($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "ERP\ConversionRate" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \ERP\ConversionRate)
                    $val = new \ERP\ConversionRate($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "ERP\ConversionRate"!', 42, $e);
        }

        return $items;
    }
}