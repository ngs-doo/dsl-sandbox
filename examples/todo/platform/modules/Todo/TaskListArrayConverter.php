<?php
namespace Todo;

require_once __DIR__.'/TaskList.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Todo\TaskList into a simple array and backwards.
 *
 * @package Todo
 * @version 0.9.9 beta
 */
abstract class TaskListArrayConverter
{/**
     * @param array|\Todo\TaskList An object or an array of objects of type "Todo\TaskList"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Todo\TaskList)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Todo\TaskList" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['name'] = $item->name;
        $ret['priority'] = $item->priority;
        $ret['isDone'] = $item->isDone;
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
                if (!$val instanceof \Todo\TaskList)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Todo\TaskList"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Todo\TaskList)
            return $item;
        if (is_array($item))
            return new \Todo\TaskList($item);

        throw new \InvalidArgumentException('Argument was not an instance of class "Todo\TaskList" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Todo\TaskList)
                    $val = new \Todo\TaskList($val);
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Todo\TaskList"!', 42, $e);
        }

        return $items;
    }
}