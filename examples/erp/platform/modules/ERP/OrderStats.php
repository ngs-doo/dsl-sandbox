<?php
namespace ERP;

/**
 * Generated from NGS DSL
 *
 *
 * @package ERP
 * @version 0.9.9 beta
 */
class OrderStats extends \NGS\Patterns\OlapCube
{
    const name = 'name';
    const created = 'created';
    const totalCreated = 'totalCreated';
    const totalDelivered = 'totalDelivered';
    const averageCost = 'averageCost';

    protected static $dimensions = array(
        'created',
        'name',
    );

    protected static $facts = array(
        'averageCost',
        'totalDelivered',
        'totalCreated',
    );

    public function getDimensions()
    {
        return self::$dimensions;
    }

    public function getFacts()
    {
        return self::$facts;
    }
}