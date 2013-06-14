<?php
namespace Todo;

require_once __DIR__.'/Group.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Todo\Group into a simple array and backwards.
 *
 * @package Todo
 * @version 0.9.9 beta
 */
abstract class GroupArrayConverter
{/**
     * @param array|\Todo\Group An object or an array of objects of type "Todo\Group"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Todo\Group)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Todo\Group" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['ID'] = $item->ID;
        $ret['name'] = $item->name;
        $ret['tasksURI'] = $item->tasksURI;
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
                if (!$val instanceof \Todo\Group)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Todo\Group"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Todo\Group)
            return $item;
        if (is_array($item))
            return new \Todo\Group($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "Todo\Group" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Todo\Group)
                    $val = new \Todo\Group($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Todo\Group"!', 42, $e);
        }

        return $items;
    }
}