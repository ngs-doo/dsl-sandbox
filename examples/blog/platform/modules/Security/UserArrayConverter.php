<?php
namespace Security;

require_once __DIR__.'/User.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Security\User into a simple array and backwards.
 *
 * @package Security
 * @version 0.9.9 beta
 */
abstract class UserArrayConverter
{/**
     * @param array|\Security\User An object or an array of objects of type "Security\User"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Security\User)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Security\User" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['ID'] = $item->ID;
        $ret['email'] = $item->email;
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
                if (!$val instanceof \Security\User)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Security\User"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Security\User)
            return $item;
        if (is_array($item))
            return new \Security\User($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "Security\User" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Security\User)
                    $val = new \Security\User($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Security\User"!', 42, $e);
        }

        return $items;
    }
}