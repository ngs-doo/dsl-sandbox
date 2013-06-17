<?php
namespace Cinema;

require_once __DIR__.'/Movie.php';

/**
 * Generated from NGS DSL
 *
 * Converts an object of class Cinema\Movie into a simple array and backwards.
 *
 * @package Cinema
 * @version 0.9.9 beta
 */
abstract class MovieArrayConverter
{/**
     * @param array|\Cinema\Movie An object or an array of objects of type "Cinema\Movie"
     *
     * @return array A simple array representation
     */
    public static function toArray($item, $allowNullValues=false)
    {
        if ($item instanceof \Cinema\Movie)
            return self::toArrayObject($item);
        if (is_array($item))
            return self::toArrayList($item, $allowNullValues);

        throw new \InvalidArgumentException('Argument was not an instance of class "Cinema\Movie" nor an array of said instances!');
    }

    private static function toArrayObject($item)
    {
        $ret = array();
        $ret['URI'] = $item->URI;
        $ret['ID'] = $item->ID;
        $ret['title'] = $item->title;
        $ret['shortTitle'] = $item->shortTitle;
        $ret['year'] = $item->year;
        $ret['durationSeconds'] = $item->durationSeconds;
        $ret['violenceFactor'] = $item->violenceFactor;
        $ret['loudnessIndex'] = $item->loudnessIndex;
        $ret['under18'] = $item->under18;
        $ret['awards'] = $item->awards;
        $ret['poster'] = $item->poster->__toString();
        $ret['released'] = $item->released->__toString();
        $ret['premiered'] = $item->premiered->__toString();
        $ret['criticsRating'] = $item->criticsRating->__toString();
        $ret['publicRating'] = $item->publicRating->toStringWith(4);
        $ret['catalogId'] = $item->catalogId->__toString();
        $ret['budget'] = $item->budget->__toString();
        if($item->captions !== null)
            $ret['captions'] = \NGS\Converter\XmlConverter::toArray($item->captions);
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
                if (!$val instanceof \Cinema\Movie)
                    throw new \InvalidArgumentException('Element with index "'.$key.'" was not an object of class "Cinema\Movie"! Type was: '.\NGS\Utils::getType($val));

                $ret[] = $val->toArray();
            }
        }

        return $ret;
    }

    public static function fromArray($item)
    {
        if ($item instanceof \Cinema\Movie)
            return $item;
        if (is_array($item))
            return new \Cinema\Movie($item, 'build_internal');

        throw new \InvalidArgumentException('Argument was not an instance of class "Cinema\Movie" nor an array of said instances!');
    }

    public static function fromArrayList(array $items, $allowNullValues=false)
    {
        try {
            foreach($items as $key => &$val) {
                if($allowNullValues && $val===null)
                    continue;
                if($val === null)
                    throw new \InvalidArgumentException('Null value found in provided array');
                if(!$val instanceof \Cinema\Movie)
                    $val = new \Cinema\Movie($val, 'build_internal');
            }
        }
        catch (\Exception $e) {
            throw new \InvalidArgumentException('Element at index '.$key.' could not be converted to object "Cinema\Movie"!', 42, $e);
        }

        return $items;
    }
}