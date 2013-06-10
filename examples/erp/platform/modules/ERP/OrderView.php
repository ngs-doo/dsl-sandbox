<?php
namespace ERP;

require_once __DIR__.'/OrderViewJsonConverter.php';
require_once __DIR__.'/OrderViewArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * @property string $URI a unique object identifier (read-only)
 * @property \NGS\LocalDate $created a date (read-only)
 * @property \NGS\LocalDate $delivery a date, can be null (read-only)
 * @property string $name a string (read-only)
 * @property string $ssn a string (read-only)
 * @property \NGS\Money $totalCost a money amount, calculated by server (read-only)
 *
 * @package ERP
 * @version 0.9.9 beta
 */
class OrderView extends \NGS\Patterns\Identifiable implements \IteratorAggregate
{
    protected $URI;
    protected $created;
    protected $delivery;
    protected $name;
    protected $ssn;
    protected $totalCost;

    /**
     * Constructs object using a key-property array or instance of class "ERP\OrderView"
     *
     * @param array|void $data key-property array or instance of class "ERP\OrderView" or pass void to provide all fields with defaults
     */
    public function __construct($data = array())
    {
        if (is_array($data)) {
            $this->fromArray($data);
        } else {
            throw new \InvalidArgumentException('Constructor parameter must be an array! Type was: '.\NGS\Utils::getType($data));
        }
    }

    /**
     * Supply default values for uninitialized properties
     *
     * @param array $data key-property array which will be filled in-place
     */
    private static function provideDefaults(array &$data)
    {
        if(!array_key_exists('created', $data))
            $data['created'] = new \NGS\LocalDate(); // a date
        if(!array_key_exists('name', $data))
            $data['name'] = ''; // a string
        if(!array_key_exists('ssn', $data))
            $data['ssn'] = ''; // a string
        if(!array_key_exists('totalCost', $data))
            $data['totalCost'] = new \NGS\Money(0); // a money amount, calculated by server
    }

    /**
     * Constructs object from a key-property array
     *
     * @param array $data key-property array
     */
    private function fromArray(array $data)
    {
        $this->provideDefaults($data);

        if(!array_key_exists('URI', $data) || $data['URI'] === null)
            throw new \LogicException('Snowflake must have non-nullable URI. It can\'t be constructed without URI!');
        $this->URI = \NGS\Converter\PrimitiveConverter::toString($data['URI']);
        unset($data['URI']);
        if (isset($data['created']))
            $this->created = new \NGS\LocalDate($data['created']);
        unset($data['created']);
        if (isset($data['delivery']))
            $this->delivery = new \NGS\LocalDate($data['delivery']);
        unset($data['delivery']);
        if (isset($data['name']))
            $this->name = \NGS\Converter\PrimitiveConverter::toString($data['name']);
        unset($data['name']);
        if (isset($data['ssn']))
            $this->ssn = \NGS\Converter\PrimitiveConverter::toString($data['ssn']);
        unset($data['ssn']);
        if (isset($data['totalCost']))
            $this->totalCost = new \NGS\Money($data['totalCost']);
        unset($data['totalCost']);

        if (count($data) !== 0 && \NGS\Utils::WarningsAsErrors())
            throw new \InvalidArgumentException('Superflous array keys found in "ERP\OrderView" constructor: '.implode(', ', array_keys($data)));
    }

// ============================================================================

    /**
     * Helper getter function, body for magic method $this->__get('URI')
     * URI is a string representation of the primary key.
     *
     * @return string unique resource identifier representing this object
     */
    public function getURI()
    {
        return $this->URI;
    }

    /**
     * @return a date
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return a date, can be null
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * @return a string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return a string
     */
    public function getSsn()
    {
        return $this->ssn;
    }

    /**
     * @return a money amount, calculated by server
     */
    public function getTotalCost()
    {
        return $this->totalCost;
    }

    /**
     * Property getter which throws Exceptions on invalid access
     *
     * @param string $name Property name
     *
     * @return mixed
     */
    public function __get($name)
    {
        if ($name === 'URI')
            return $this->getURI(); // a string representing a unique object identifier
        if ($name === 'created')
            return $this->getCreated(); // a date
        if ($name === 'delivery')
            return $this->getDelivery(); // a date, can be null
        if ($name === 'name')
            return $this->getName(); // a string
        if ($name === 'ssn')
            return $this->getSsn(); // a string
        if ($name === 'totalCost')
            return $this->getTotalCost(); // a money amount, calculated by server

        throw new \InvalidArgumentException('Property "'.$name.'" in class "ERP\OrderView" does not exist and could not be retrieved!');
    }

// ============================================================================

    /**
     * Property existence checker
     *
     * @param string $name Property name to check for existence
     *
     * @return bool will return true if and only if the propery exist and is not null
     */
    public function __isset($name)
    {
        if ($name === 'URI')
            return true;
        if ($name === 'created')
            return true; // a date (always set)
        if ($name === 'delivery')
            return $this->getDelivery() !== null; // a date, can be null
        if ($name === 'name')
            return true; // a string (always set)
        if ($name === 'ssn')
            return true; // a string (always set)
        if ($name === 'totalCost')
            return true; // a money amount, calculated by server (always set)

        return false;
    }

    /**
     * Property setter which throws an exception because snowflakes are read-only
     *
     * @param string $name Property name
     * @param mixed $value Property value
     */
    public function __set($name, $value)
    {
        throw new \LogicException('Property "'.$name.'" in "ERP\OrderView" cannot be set, because all properties in snowflake are read-only!');
    }

    /**
     * Property unsetter which throws an exception because snowflakes are read-only
     *
     * @param string $name Property name to unset (set to null)
     */
    public function __unset($name)
    {
        throw new \LogicException('The property "'.$name.'" cannot be unset because snowflake properties are read-only!');
    }

    public function toJson()
    {
        return \ERP\OrderViewJsonConverter::toJson($this);
    }

    public static function fromJson($item)
    {
        return \ERP\OrderViewJsonConverter::fromJson($item);
    }

    public function __toString()
    {
        return 'ERP\OrderView'.$this->toJson();
    }

    public function __clone()
    {
        return \ERP\OrderViewArrayConverter::fromArray(\ERP\OrderViewArrayConverter::toArray($this));
    }

    public function toArray()
    {
        return \ERP\OrderViewArrayConverter::toArray($this);
    }

    /**
     * Implementation of the IteratorAggregate interface via \ArrayIterator
     *
     * @return Traversable a new iterator specially created for this iteratation
     */
    public function getIterator()
    {
        return new \ArrayIterator(\ERP\OrderViewArrayConverter::toArray($this));
    }
}