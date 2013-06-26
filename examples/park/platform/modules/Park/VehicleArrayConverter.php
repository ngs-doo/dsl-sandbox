<?php
namespace Park;

require_once __DIR__.'/Vehicle.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Park\Vehicle into a simple array and backwards.
 *
 * @package Park
 * @version 0.9.9 beta
 */
abstract class VehicleArrayConverter
{/**
     * @param array|\Park\Vehicle An object or an array of objects of type "Park\Vehicle"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Park\Vehicle)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Park\Vehicle" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['ID'] = $item->ID;
        $ret['model'] = $item->model;
        $ret['year'] = $item->year;
        $ret['engineID'] = $item->engineID;
        if($item->engine !== null)
            $ret['engine'] = \Park\EngineArrayConverter::toArray($item->engine);
        $ret['muscleCar'] = $item->muscleCar;
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
                if (!$val instanceof \Park\Vehicle)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Park\Vehicle"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Park\Vehicle)
            return $item;
        if (is_array($item))
            return new \Park\Vehicle($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "Park\Vehicle" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Park\Vehicle)
                    $val = new \Park\Vehicle($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Park\Vehicle"!', 42, $e);
        }

        return $items;
    }
}