<?php
namespace Store\Product;

require_once __DIR__.'/findByPriceRangeJsonConverter.php';
require_once __DIR__.'/findByPriceRangeArrayConverter.php';
require_once __DIR__.'/../Product.php';

/**
 * Generated from NGS DSL
 *
 * @property \NGS\Money $min a money amount
 * @property \NGS\Money $max a money amount
 *
 * @package Store
 * @version 0.9.9 beta
 */
class findByPriceRange extends \NGS\Patterns\Specification
{
    protected $min;
    protected $max;

    /**
     * Constructs object using a key-property array or instance of class "Store\Product\findByPriceRange"
     *
     * @param array|void $data key-property array or instance of class "Store\Product\findByPriceRange" or pass void to provide all fields with defaults
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
        if(!array_key_exists('min', $data))
            $data['min'] = new \NGS\Money(0); // a money amount
        if(!array_key_exists('max', $data))
            $data['max'] = new \NGS\Money(0); // a money amount
    }

    /**
     * Constructs object from a key-property array
     *
     * @param array $data key-property array
     */
    private function fromArray(array $data)
    {
        $this->provideDefaults($data);

        if (array_key_exists('min', $data))
            $this->setMin($data['min']);
        unset($data['min']);
        if (array_key_exists('max', $data))
            $this->setMax($data['max']);
        unset($data['max']);

        if (count($data) !== 0 && \NGS\Utils::WarningsAsErrors())
            throw new \InvalidArgumentException('Superflous array keys found in "Store\Product\findByPriceRange" constructor: '.implode(', ', array_keys($data)));
    }

// ============================================================================

    /**
     * @return a money amount
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * @return a money amount
     */
    public function getMax()
    {
        return $this->max;
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
        if ($name === 'min')
            return $this->getMin(); // a money amount
        if ($name === 'max')
            return $this->getMax(); // a money amount

        throw new \InvalidArgumentException('Property "'.$name.'" in class "Store\Product\findByPriceRange" does not exist and could not be retrieved!');
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
        if ($name === 'min')
            return true; // a money amount (always set)
        if ($name === 'max')
            return true; // a money amount (always set)

        return false;
    }

    /**
     * @param \NGS\Money $value a money amount
     *
     * @return \NGS\Money
     */
    public function setMin($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "min" cannot be set to null because it is non-nullable!');
        $value = new \NGS\Money($value);
        $this->min = $value;
        return $value;
    }

    /**
     * @param \NGS\Money $value a money amount
     *
     * @return \NGS\Money
     */
    public function setMax($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "max" cannot be set to null because it is non-nullable!');
        $value = new \NGS\Money($value);
        $this->max = $value;
        return $value;
    }

    /**
     * Property setter which checks for invalid access to specification properties and enforces proper type checks
     *
     * @param string $name Property name
     * @param mixed $value Property value
     */
    public function __set($name, $value)
    {
        if ($name === 'min')
            return $this->setMin($value); // a money amount
        if ($name === 'max')
            return $this->setMax($value); // a money amount
        throw new \InvalidArgumentException('Property "'.$name.'" in class "Store\Product\findByPriceRange" does not exist and could not be set!');
    }

    /**
     * Will unset a property if it exists, but throw an exception if it is not nullable
     *
     * @param string $name Property name to unset (set to null)
     */
    public function __unset($name)
    {
        if ($name === 'min')
            throw new \LogicException('The property "min" cannot be unset because it is non-nullable!'); // a money amount (cannot be unset)
        if ($name === 'max')
            throw new \LogicException('The property "max" cannot be unset because it is non-nullable!'); // a money amount (cannot be unset)
    }

    public function toJson()
    {
        return \Store\Product\findByPriceRangeJsonConverter::toJson($this);
    }

    public static function fromJson($item)
    {
        return \Store\Product\findByPriceRangeJsonConverter::fromJson($item);
    }

    public function __toString()
    {
        return 'Store\Product\findByPriceRange'.$this->toJson();
    }

    public function __clone()
    {
        return \Store\Product\findByPriceRangeArrayConverter::fromArray(\Store\Product\findByPriceRangeArrayConverter::toArray($this));
    }

    public function toArray()
    {
        return \Store\Product\findByPriceRangeArrayConverter::toArray($this);
    }
}