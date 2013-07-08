<?php
namespace Account;

require_once __DIR__.'/Profile.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Account\Profile into a simple array and backwards.
 *
 * @package Account
 * @version 0.9.9 beta
 */
abstract class ProfileArrayConverter
{/**
     * @param array|\Account\Profile An object or an array of objects of type "Account\Profile"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Account\Profile)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Account\Profile" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['userEmail'] = $item->userEmail;
        $ret['description'] = $item->description;
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
                if (!$val instanceof \Account\Profile)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Account\Profile"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Account\Profile)
            return $item;
        if (is_array($item))
            return new \Account\Profile($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "Account\Profile" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Account\Profile)
                    $val = new \Account\Profile($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Account\Profile"!', 42, $e);
        }

        return $items;
    }
}