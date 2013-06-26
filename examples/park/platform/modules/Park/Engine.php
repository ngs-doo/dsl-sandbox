<?php
namespace Park;

require_once __DIR__.'/EngineJsonConverter.php';
require_once __DIR__.'/EngineArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * @property string $URI a unique object identifier (read-only)
 * @property string $serialNumber a string
 * @property int $power an integer number
 *
 * @package Park
 * @version 0.9.9 beta
 */
class Engine implements \IteratorAggregate
{
    protected $URI;
    protected $serialNumber;
    protected $power;

    /**
     * Constructs object using a key-property array or instance of class "Park\Engine"
     *
     * @param array|void $data key-property array or instance of class "Park\Engine" or pass void to provide all fields with defaults
     */
    public function __construct($data = array(), $construction_type = '')
    {
        if(is_array($data) && $construction_type !== 'build_internal') {
            foreach($data as $key => $val) {
                if(in_array($key, self::$_read_only_properties, true))
                    throw new \LogicException($key.' is a read only property and can\'t be set through the constructor.');
            }
        }
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
        if(!array_key_exists('URI', $data))
            $data['URI'] = null; //a string representing a unique object identifier
        if(!array_key_exists('serialNumber', $data))
            $data['serialNumber'] = ''; // a string
        if(!array_key_exists('power', $data))
            $data['power'] = 0; // an integer number
    }

    /**
     * Constructs object from a key-property array
     *
     * @param array $data key-property array
     */
    private function fromArray(array $data)
    {
        $this->provideDefaults($data);

        if(isset($data['URI']))
            $this->URI = \NGS\Converter\PrimitiveConverter::toString($data['URI']);
        unset($data['URI']);
        if (array_key_exists('serialNumber', $data))
            $this->setSerialNumber($data['serialNumber']);
        unset($data['serialNumber']);
        if (array_key_exists('power', $data))
            $this->setPower($data['power']);
        unset($data['power']);

        if (count($data) !== 0 && \NGS\Utils::WarningsAsErrors())
            throw new \InvalidArgumentException('Superflous array keys found in "Park\Engine" constructor: '.implode(', ', array_keys($data)));
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
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * @return an integer number
     */
    public function getPower()
    {
        return $this->power;
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
        if ($name === 'serialNumber')
            return $this->getSerialNumber(); // a string
        if ($name === 'power')
            return $this->getPower(); // an integer number

        throw new \InvalidArgumentException('Property "'.$name.'" in class "Park\Engine" does not exist and could not be retrieved!');
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
            return $this->URI !== null;
        if ($name === 'serialNumber')
            return true; // a string (always set)
        if ($name === 'power')
            return true; // an integer number (always set)

        return false;
    }

    private static $_read_only_properties = array('URI');

    /**
     * @param string $value a string
     *
     * @return string
     */
    public function setSerialNumber($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "serialNumber" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toString($value);
        $this->serialNumber = $value;
        return $value;
    }

    /**
     * @param int $value an integer number
     *
     * @return int
     */
    public function setPower($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "power" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toInteger($value);
        $this->power = $value;
        return $value;
    }

    /**
     * Property setter which checks for invalid access to entity properties and enforces proper type checks
     *
     * @param string $name Property name
     * @param mixed $value Property value
     */
    public function __set($name, $value)
    {
        if(in_array($name, self::$_read_only_properties, true))
            throw new \LogicException('Property "'.$name.'" in "Park\Engine" cannot be set, because it is read-only!');
        if ($name === 'serialNumber')
            return $this->setSerialNumber($value); // a string
        if ($name === 'power')
            return $this->setPower($value); // an integer number
        throw new \InvalidArgumentException('Property "'.$name.'" in class "Park\Engine" does not exist and could not be set!');
    }

    /**
     * Will unset a property if it exists, but throw an exception if it is not nullable
     *
     * @param string $name Property name to unset (set to null)
     */
    public function __unset($name)
    {
        if(in_array($name, self::$_read_only_properties, true))
            throw new \LogicException('Property "'.$name.'" cannot be unset, because it is read-only!');
        if ($name === 'serialNumber')
            throw new \LogicException('The property "serialNumber" cannot be unset because it is non-nullable!'); // a string (cannot be unset)
        if ($name === 'power')
            throw new \LogicException('The property "power" cannot be unset because it is non-nullable!'); // an integer number (cannot be unset)
    }

    public function toJson()
    {
        return \Park\EngineJsonConverter::toJson($this);
    }

    public static function fromJson($item)
    {
        return \Park\EngineJsonConverter::fromJson($item);
    }

    public function __toString()
    {
        return 'Park\Engine'.$this->toJson();
    }

    public function __clone()
    {
        return \Park\EngineArrayConverter::fromArray(\Park\EngineArrayConverter::toArray($this));
    }

    public function toArray()
    {
        return \Park\EngineArrayConverter::toArray($this);
    }

    /**
     * Implementation of the IteratorAggregate interface via \ArrayIterator
     *
     * @return Traversable a new iterator specially created for this iteratation
     */
    public function getIterator()
    {
        return new \ArrayIterator(\Park\EngineArrayConverter::toArray($this));
    }
}