<?php
namespace Park;

require_once __DIR__.'/CurrentStateJsonConverter.php';
require_once __DIR__.'/CurrentStateArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * @property float $litersInTank a floating point number
 * @property int $mileage an integer number
 * @property int $oilChangeIn an integer number
 *
 * @package Park
 * @version 0.9.9 beta
 */
class CurrentState implements \IteratorAggregate
{
    protected $litersInTank;
    protected $mileage;
    protected $oilChangeIn;

    /**
     * Constructs object using a key-property array or instance of class "Park\CurrentState"
     *
     * @param array|void $data key-property array or instance of class "Park\CurrentState" or pass void to provide all fields with defaults
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
        if(!array_key_exists('litersInTank', $data))
            $data['litersInTank'] = 0.; // a floating point number
        if(!array_key_exists('mileage', $data))
            $data['mileage'] = 0; // an integer number
        if(!array_key_exists('oilChangeIn', $data))
            $data['oilChangeIn'] = 0; // an integer number
    }

    /**
     * Constructs object from a key-property array
     *
     * @param array $data key-property array
     */
    private function fromArray(array $data)
    {
        $this->provideDefaults($data);

        if (array_key_exists('litersInTank', $data))
            $this->setLitersInTank($data['litersInTank']);
        unset($data['litersInTank']);
        if (array_key_exists('mileage', $data))
            $this->setMileage($data['mileage']);
        unset($data['mileage']);
        if (array_key_exists('oilChangeIn', $data))
            $this->setOilChangeIn($data['oilChangeIn']);
        unset($data['oilChangeIn']);

        if (count($data) !== 0 && \NGS\Utils::WarningsAsErrors())
            throw new \InvalidArgumentException('Superflous array keys found in "Park\CurrentState" constructor: '.implode(', ', array_keys($data)));
    }

// ============================================================================

    /**
     * @return a floating point number
     */
    public function getLitersInTank()
    {
        return $this->litersInTank;
    }

    /**
     * @return an integer number
     */
    public function getMileage()
    {
        return $this->mileage;
    }

    /**
     * @return an integer number
     */
    public function getOilChangeIn()
    {
        return $this->oilChangeIn;
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
        if ($name === 'litersInTank')
            return $this->getLitersInTank(); // a floating point number
        if ($name === 'mileage')
            return $this->getMileage(); // an integer number
        if ($name === 'oilChangeIn')
            return $this->getOilChangeIn(); // an integer number

        throw new \InvalidArgumentException('Property "'.$name.'" in class "Park\CurrentState" does not exist and could not be retrieved!');
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
        if ($name === 'litersInTank')
            return true; // a floating point number (always set)
        if ($name === 'mileage')
            return true; // an integer number (always set)
        if ($name === 'oilChangeIn')
            return true; // an integer number (always set)

        return false;
    }

    /**
     * @param float $value a floating point number
     *
     * @return float
     */
    public function setLitersInTank($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "litersInTank" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toFloat($value);
        $this->litersInTank = $value;
        return $value;
    }

    /**
     * @param int $value an integer number
     *
     * @return int
     */
    public function setMileage($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "mileage" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toInteger($value);
        $this->mileage = $value;
        return $value;
    }

    /**
     * @param int $value an integer number
     *
     * @return int
     */
    public function setOilChangeIn($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "oilChangeIn" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toInteger($value);
        $this->oilChangeIn = $value;
        return $value;
    }

    /**
     * Property setter which checks for invalid access to value properties and enforces proper type checks
     *
     * @param string $name Property name
     * @param mixed $value Property value
     */
    public function __set($name, $value)
    {
        if ($name === 'litersInTank')
            return $this->setLitersInTank($value); // a floating point number
        if ($name === 'mileage')
            return $this->setMileage($value); // an integer number
        if ($name === 'oilChangeIn')
            return $this->setOilChangeIn($value); // an integer number
        throw new \InvalidArgumentException('Property "'.$name.'" in class "Park\CurrentState" does not exist and could not be set!');
    }

    /**
     * Will unset a property if it exists, but throw an exception if it is not nullable
     *
     * @param string $name Property name to unset (set to null)
     */
    public function __unset($name)
    {
        if ($name === 'litersInTank')
            throw new \LogicException('The property "litersInTank" cannot be unset because it is non-nullable!'); // a floating point number (cannot be unset)
        if ($name === 'mileage')
            throw new \LogicException('The property "mileage" cannot be unset because it is non-nullable!'); // an integer number (cannot be unset)
        if ($name === 'oilChangeIn')
            throw new \LogicException('The property "oilChangeIn" cannot be unset because it is non-nullable!'); // an integer number (cannot be unset)
    }

    public function toJson()
    {
        return \Park\CurrentStateJsonConverter::toJson($this);
    }

    public static function fromJson($item)
    {
        return \Park\CurrentStateJsonConverter::fromJson($item);
    }

    public function __toString()
    {
        return 'Park\CurrentState'.$this->toJson();
    }

    public function __clone()
    {
        return \Park\CurrentStateArrayConverter::fromArray(\Park\CurrentStateArrayConverter::toArray($this));
    }

    public function toArray()
    {
        return \Park\CurrentStateArrayConverter::toArray($this);
    }

    /**
     * Implementation of the IteratorAggregate interface via \ArrayIterator
     *
     * @return Traversable a new iterator specially created for this iteratation
     */
    public function getIterator()
    {
        return new \ArrayIterator(\Park\CurrentStateArrayConverter::toArray($this));
    }
}