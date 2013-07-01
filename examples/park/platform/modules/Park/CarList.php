<?php
namespace Park;

require_once __DIR__.'/CarListJsonConverter.php';
require_once __DIR__.'/CarListArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * @property string $URI a unique object identifier (read-only)
 * @property string $model a string (read-only)
 * @property int $year an integer number (read-only)
 * @property int $power an integer number (read-only)
 * @property int $mileage an integer number, can be null (read-only)
 * @property bool $muscleCar specification property, calculated by server (read-only)
 * @property bool $oldtimer specification property, calculated by server (read-only)
 *
 * @package Park
 * @version 0.9.9 beta
 */
class CarList extends \NGS\Patterns\Identifiable implements \IteratorAggregate
{
    protected $URI;
    protected $model;
    protected $year;
    protected $power;
    protected $mileage;
    protected $muscleCar;
    protected $oldtimer;

    /**
     * Constructs object using a key-property array or instance of class "Park\CarList"
     *
     * @param array|void $data key-property array or instance of class "Park\CarList" or pass void to provide all fields with defaults
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
        if(!array_key_exists('model', $data))
            $data['model'] = ''; // a string
        if(!array_key_exists('year', $data))
            $data['year'] = 0; // an integer number
        if(!array_key_exists('power', $data))
            $data['power'] = 0; // an integer number
        if(!array_key_exists('muscleCar', $data))
            $data['muscleCar'] = false; // specification property, calculated by server
        if(!array_key_exists('oldtimer', $data))
            $data['oldtimer'] = false; // specification property, calculated by server
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
        if (isset($data['model']))
            $this->model = \NGS\Converter\PrimitiveConverter::toString($data['model']);
        unset($data['model']);
        if (isset($data['year']))
            $this->year = \NGS\Converter\PrimitiveConverter::toInteger($data['year']);
        unset($data['year']);
        if (isset($data['power']))
            $this->power = \NGS\Converter\PrimitiveConverter::toInteger($data['power']);
        unset($data['power']);
        if (isset($data['mileage']))
            $this->mileage = \NGS\Converter\PrimitiveConverter::toInteger($data['mileage']);
        unset($data['mileage']);
        if (isset($data['muscleCar']))
            $this->muscleCar = \NGS\Converter\PrimitiveConverter::toBoolean($data['muscleCar']);
        unset($data['muscleCar']);
        if (isset($data['oldtimer']))
            $this->oldtimer = \NGS\Converter\PrimitiveConverter::toBoolean($data['oldtimer']);
        unset($data['oldtimer']);

        if (count($data) !== 0 && \NGS\Utils::WarningsAsErrors())
            throw new \InvalidArgumentException('Superflous array keys found in "Park\CarList" constructor: '.implode(', ', array_keys($data)));
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
     * @return a string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return an integer number
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @return an integer number
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * @return an integer number, can be null
     */
    public function getMileage()
    {
        return $this->mileage;
    }

    /**
     * @return specification property, calculated by server
     */
    public function getMuscleCar()
    {
        return $this->muscleCar;
    }

    /**
     * @return specification property, calculated by server
     */
    public function getOldtimer()
    {
        return $this->oldtimer;
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
        if ($name === 'model')
            return $this->getModel(); // a string
        if ($name === 'year')
            return $this->getYear(); // an integer number
        if ($name === 'power')
            return $this->getPower(); // an integer number
        if ($name === 'mileage')
            return $this->getMileage(); // an integer number, can be null
        if ($name === 'muscleCar')
            return $this->getMuscleCar(); // specification property, calculated by server
        if ($name === 'oldtimer')
            return $this->getOldtimer(); // specification property, calculated by server

        throw new \InvalidArgumentException('Property "'.$name.'" in class "Park\CarList" does not exist and could not be retrieved!');
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
        if ($name === 'model')
            return true; // a string (always set)
        if ($name === 'year')
            return true; // an integer number (always set)
        if ($name === 'power')
            return true; // an integer number (always set)
        if ($name === 'mileage')
            return $this->getMileage() !== null; // an integer number, can be null
        if ($name === 'muscleCar')
            return true; // specification property, calculated by server (always set)
        if ($name === 'oldtimer')
            return true; // specification property, calculated by server (always set)

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
        throw new \LogicException('Property "'.$name.'" in "Park\CarList" cannot be set, because all properties in snowflake are read-only!');
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
        return \Park\CarListJsonConverter::toJson($this);
    }

    public static function fromJson($item)
    {
        return \Park\CarListJsonConverter::fromJson($item);
    }

    public function __toString()
    {
        return 'Park\CarList'.$this->toJson();
    }

    public function __clone()
    {
        return \Park\CarListArrayConverter::fromArray(\Park\CarListArrayConverter::toArray($this));
    }

    public function toArray()
    {
        return \Park\CarListArrayConverter::toArray($this);
    }

    /**
     * Implementation of the IteratorAggregate interface via \ArrayIterator
     *
     * @return Traversable a new iterator specially created for this iteratation
     */
    public function getIterator()
    {
        return new \ArrayIterator(\Park\CarListArrayConverter::toArray($this));
    }
}