<?php
namespace Todo;

require_once __DIR__.'/MarkDone.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Todo\MarkDone into a simple array and backwards.
 *
 * @package Todo
 * @version 0.9.9 beta
 */
abstract class MarkDoneArrayConverter
{/**
     * @param array|\Todo\MarkDone An object or an array of objects of type "Todo\MarkDone"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Todo\MarkDone)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Todo\MarkDone" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['taskURI'] = $item->taskURI;
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
                if (!$val instanceof \Todo\MarkDone)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Todo\MarkDone"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Todo\MarkDone)
            return $item;
        if (is_array($item))
            return new \Todo\MarkDone($item);

        throw new \InvalidArgumentException('Argument was not an instance of class "Todo\MarkDone" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Todo\MarkDone)
                    $val = new \Todo\MarkDone($val);
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Todo\MarkDone"!', 42, $e);
        }

        return $items;
    }
}