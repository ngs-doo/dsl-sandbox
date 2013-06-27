<?php
namespace Park;

require_once __DIR__.'/Company.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Park\Company into a simple array and backwards.
 *
 * @package Park
 * @version 0.9.9 beta
 */
abstract class CompanyArrayConverter
{/**
     * @param array|\Park\Company An object or an array of objects of type "Park\Company"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Park\Company)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Park\Company" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['ID'] = $item->ID;
        $ret['name'] = $item->name;
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
                if (!$val instanceof \Park\Company)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Park\Company"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Park\Company)
            return $item;
        if (is_array($item))
            return new \Park\Company($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "Park\Company" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Park\Company)
                    $val = new \Park\Company($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Park\Company"!', 42, $e);
        }

        return $items;
    }
}