<?php
namespace Todo;

require_once __DIR__.'/Task.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Todo\Task into a simple array and backwards.
 *
 * @package Todo
 * @version 0.9.9 beta
 */
abstract class TaskArrayConverter
{/**
     * @param array|\Todo\Task An object or an array of objects of type "Todo\Task"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Todo\Task)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Todo\Task" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['ID'] = $item->ID;
        $ret['name'] = $item->name;
        $ret['priority'] = $item->priority;
        $ret['isDone'] = $item->isDone;
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
                if (!$val instanceof \Todo\Task)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Todo\Task"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Todo\Task)
            return $item;
        if (is_array($item))
            return new \Todo\Task($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "Todo\Task" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Todo\Task)
                    $val = new \Todo\Task($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Todo\Task"!', 42, $e);
        }

        return $items;
    }
}