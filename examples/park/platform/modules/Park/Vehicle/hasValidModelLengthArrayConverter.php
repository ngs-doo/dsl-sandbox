<?php
namespace Park\Vehicle;

require_once __DIR__.'/hasValidModelLength.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Park\Vehicle\hasValidModelLength into a simple array and backwards.
 *
 * @package Park
 * @version 0.9.9 beta
 */
abstract class hasValidModelLengthArrayConverter
{/**
     * @param array|\Park\Vehicle\hasValidModelLength An object or an array of objects of type "Park\Vehicle\hasValidModelLength"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Park\Vehicle\hasValidModelLength)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Park\Vehicle\hasValidModelLength" nor an array of said instances!');
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
                if (!$val instanceof \Park\Vehicle\hasValidModelLength)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Park\Vehicle\hasValidModelLength"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Park\Vehicle\hasValidModelLength)
            return $item;
        if (is_array($item))
            return new \Park\Vehicle\hasValidModelLength($item);

        throw new \InvalidArgumentException('Argument was not an instance of class "Park\Vehicle\hasValidModelLength" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Park\Vehicle\hasValidModelLength)
                    $val = new \Park\Vehicle\hasValidModelLength($val);
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Park\Vehicle\hasValidModelLength"!', 42, $e);
        }

        return $items;
    }
}