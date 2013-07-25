<?php
namespace Chat;

require_once __DIR__.'/Message.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Chat\Message into a simple array and backwards.
 *
 * @package Chat
 * @version 0.9.9 beta
 */
abstract class MessageArrayConverter
{/**
     * @param array|\Chat\Message An object or an array of objects of type "Chat\Message"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Chat\Message)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Chat\Message" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['ID'] = $item->ID;
        $ret['created'] = $item->created->__toString();
        $ret['content'] = $item->content;
        $ret['fromID'] = $item->fromID;
        if($item->fromURI !== null)
            $ret['fromURI'] = $item->fromURI;
        $ret['toID'] = $item->toID;
        $ret['toURI'] = $item->toURI;
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
                if (!$val instanceof \Chat\Message)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Chat\Message"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Chat\Message)
            return $item;
        if (is_array($item))
            return new \Chat\Message($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "Chat\Message" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Chat\Message)
                    $val = new \Chat\Message($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Chat\Message"!', 42, $e);
        }

        return $items;
    }
}