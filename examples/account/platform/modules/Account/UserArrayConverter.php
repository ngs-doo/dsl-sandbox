<?php
namespace Account;

require_once __DIR__.'/User.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Account\User into a simple array and backwards.
 *
 * @package Account
 * @version 0.9.9 beta
 */
abstract class UserArrayConverter
{/**
     * @param array|\Account\User An object or an array of objects of type "Account\User"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Account\User)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Account\User" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['email'] = $item->email;
        $ret['created'] = $item->created->__toString();
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
                if (!$val instanceof \Account\User)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Account\User"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Account\User)
            return $item;
        if (is_array($item))
            return new \Account\User($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "Account\User" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Account\User)
                    $val = new \Account\User($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Account\User"!', 42, $e);
        }

        return $items;
    }
}