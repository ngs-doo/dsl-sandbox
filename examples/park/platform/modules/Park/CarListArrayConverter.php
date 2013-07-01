<?php
namespace Park;

require_once __DIR__.'/CarList.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Park\CarList into a simple array and backwards.
 *
 * @package Park
 * @version 0.9.9 beta
 */
abstract class CarListArrayConverter
{/**
     * @param array|\Park\CarList An object or an array of objects of type "Park\CarList"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Park\CarList)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Park\CarList" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['model'] = $item->model;
        $ret['year'] = $item->year;
        $ret['power'] = $item->power;
        $ret['mileage'] = $item->mileage;
        $ret['muscleCar'] = $item->muscleCar;
        $ret['oldtimer'] = $item->oldtimer;
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
                if (!$val instanceof \Park\CarList)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Park\CarList"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Park\CarList)
            return $item;
        if (is_array($item))
            return new \Park\CarList($item);

        throw new \InvalidArgumentException('Argument was not an instance of class "Park\CarList" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Park\CarList)
                    $val = new \Park\CarList($val);
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Park\CarList"!', 42, $e);
        }

        return $items;
    }
}