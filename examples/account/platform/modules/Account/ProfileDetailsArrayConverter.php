<?php
namespace Account;

require_once __DIR__.'/ProfileDetails.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Account\ProfileDetails into a simple array and backwards.
 *
 * @package Account
 * @version 0.9.9 beta
 */
abstract class ProfileDetailsArrayConverter
{/**
     * @param array|\Account\ProfileDetails An object or an array of objects of type "Account\ProfileDetails"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Account\ProfileDetails)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Account\ProfileDetails" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['email'] = $item->email;
        $ret['userCreated'] = $item->userCreated->__toString();
        $ret['profileCreated'] = $item->profileCreated->__toString();
        $ret['description'] = $item->description;
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
                if (!$val instanceof \Account\ProfileDetails)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Account\ProfileDetails"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Account\ProfileDetails)
            return $item;
        if (is_array($item))
            return new \Account\ProfileDetails($item);

        throw new \InvalidArgumentException('Argument was not an instance of class "Account\ProfileDetails" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Account\ProfileDetails)
                    $val = new \Account\ProfileDetails($val);
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Account\ProfileDetails"!', 42, $e);
        }

        return $items;
    }
}