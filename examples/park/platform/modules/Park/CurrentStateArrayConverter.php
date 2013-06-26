<?php
namespace Park;

require_once __DIR__.'/CurrentState.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Park\CurrentState into a simple array and backwards.
 *
 * @package Park
 * @version 0.9.9 beta
 */
abstract class CurrentStateArrayConverter
{/**
     * @param array|\Park\CurrentState An object or an array of objects of type "Park\CurrentState"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Park\CurrentState)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Park\CurrentState" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['litersInTank'] = $item->litersInTank;
        $ret['mileage'] = $item->mileage;
        $ret['oilChangeIn'] = $item->oilChangeIn;
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
                if (!$val instanceof \Park\CurrentState)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Park\CurrentState"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Park\CurrentState)
            return $item;
        if (is_array($item))
            return new \Park\CurrentState($item);

        throw new \InvalidArgumentException('Argument was not an instance of class "Park\CurrentState" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Park\CurrentState)
                    $val = new \Park\CurrentState($val);
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Park\CurrentState"!', 42, $e);
        }

        return $items;
    }
}