<?php
namespace Chat;

require_once __DIR__.'/MessageView.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Chat\MessageView into a simple array and backwards.
 *
 * @package Chat
 * @version 0.9.9 beta
 */
abstract class MessageViewArrayConverter
{/**
     * @param array|\Chat\MessageView An object or an array of objects of type "Chat\MessageView"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Chat\MessageView)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Chat\MessageView" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['created'] = $item->created->__toString();
        $ret['content'] = $item->content;
        $ret['fromID'] = $item->fromID;
        $ret['fromName'] = $item->fromName;
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
                if (!$val instanceof \Chat\MessageView)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Chat\MessageView"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Chat\MessageView)
            return $item;
        if (is_array($item))
            return new \Chat\MessageView($item);

        throw new \InvalidArgumentException('Argument was not an instance of class "Chat\MessageView" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Chat\MessageView)
                    $val = new \Chat\MessageView($val);
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Chat\MessageView"!', 42, $e);
        }

        return $items;
    }
}