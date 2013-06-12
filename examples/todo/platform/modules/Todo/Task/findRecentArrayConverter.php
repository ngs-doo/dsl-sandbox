<?php
namespace Todo\Task;

require_once __DIR__.'/findRecent.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Todo\Task\findRecent into a simple array and backwards.
 *
 * @package Todo
 * @version 0.9.9 beta
 */
abstract class findRecentArrayConverter
{/**
     * @param array|\Todo\Task\findRecent An object or an array of objects of type "Todo\Task\findRecent"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Todo\Task\findRecent)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Todo\Task\findRecent" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['days'] = $item->days;
        $ret['minPriority'] = $item->minPriority;
        $ret['maxPriority'] = $item->maxPriority;
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
                if (!$val instanceof \Todo\Task\findRecent)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Todo\Task\findRecent"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Todo\Task\findRecent)
            return $item;
        if (is_array($item))
            return new \Todo\Task\findRecent($item);

        throw new \InvalidArgumentException('Argument was not an instance of class "Todo\Task\findRecent" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Todo\Task\findRecent)
                    $val = new \Todo\Task\findRecent($val);
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Todo\Task\findRecent"!', 42, $e);
        }

        return $items;
    }
}