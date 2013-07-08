<?php
namespace Account;

require_once __DIR__.'/ProfileDetailsJsonConverter.php';
require_once __DIR__.'/ProfileDetailsArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * @property string $URI a unique object identifier (read-only)
 * @property string $email a string (read-only)
 * @property \NGS\LocalDate $userCreated a date (read-only)
 * @property \NGS\LocalDate $profileCreated a date (read-only)
 * @property string $description a string (read-only)
 *
 * @package Account
 * @version 0.9.9 beta
 */
class ProfileDetails extends \NGS\Patterns\Identifiable implements \IteratorAggregate
{
    protected $URI;
    protected $email;
    protected $userCreated;
    protected $profileCreated;
    protected $description;

    /**
     * Constructs object using a key-property array or instance of class "Account\ProfileDetails"
     *
     * @param array|void $data key-property array or instance of class "Account\ProfileDetails" or pass void to provide all fields with defaults
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
        if(!array_key_exists('email', $data))
            $data['email'] = ''; // a string
        if(!array_key_exists('userCreated', $data))
            $data['userCreated'] = new \NGS\LocalDate(); // a date
        if(!array_key_exists('profileCreated', $data))
            $data['profileCreated'] = new \NGS\LocalDate(); // a date
        if(!array_key_exists('description', $data))
            $data['description'] = ''; // a string
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
        if (isset($data['email']))
            $this->email = \NGS\Converter\PrimitiveConverter::toString($data['email']);
        unset($data['email']);
        if (isset($data['userCreated']))
            $this->userCreated = new \NGS\LocalDate($data['userCreated']);
        unset($data['userCreated']);
        if (isset($data['profileCreated']))
            $this->profileCreated = new \NGS\LocalDate($data['profileCreated']);
        unset($data['profileCreated']);
        if (isset($data['description']))
            $this->description = \NGS\Converter\PrimitiveConverter::toString($data['description']);
        unset($data['description']);

        if (count($data) !== 0 && \NGS\Utils::WarningsAsErrors())
            throw new \InvalidArgumentException('Superflous array keys found in "Account\ProfileDetails" constructor: '.implode(', ', array_keys($data)));
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return a date
     */
    public function getUserCreated()
    {
        return $this->userCreated;
    }

    /**
     * @return a date
     */
    public function getProfileCreated()
    {
        return $this->profileCreated;
    }

    /**
     * @return a string
     */
    public function getDescription()
    {
        return $this->description;
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
        if ($name === 'email')
            return $this->getEmail(); // a string
        if ($name === 'userCreated')
            return $this->getUserCreated(); // a date
        if ($name === 'profileCreated')
            return $this->getProfileCreated(); // a date
        if ($name === 'description')
            return $this->getDescription(); // a string

        throw new \InvalidArgumentException('Property "'.$name.'" in class "Account\ProfileDetails" does not exist and could not be retrieved!');
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
        if ($name === 'email')
            return true; // a string (always set)
        if ($name === 'userCreated')
            return true; // a date (always set)
        if ($name === 'profileCreated')
            return true; // a date (always set)
        if ($name === 'description')
            return true; // a string (always set)

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
        throw new \LogicException('Property "'.$name.'" in "Account\ProfileDetails" cannot be set, because all properties in snowflake are read-only!');
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
        return \Account\ProfileDetailsJsonConverter::toJson($this);
    }

    public static function fromJson($item)
    {
        return \Account\ProfileDetailsJsonConverter::fromJson($item);
    }

    public function __toString()
    {
        return 'Account\ProfileDetails'.$this->toJson();
    }

    public function __clone()
    {
        return \Account\ProfileDetailsArrayConverter::fromArray(\Account\ProfileDetailsArrayConverter::toArray($this));
    }

    public function toArray()
    {
        return \Account\ProfileDetailsArrayConverter::toArray($this);
    }

    /**
     * Implementation of the IteratorAggregate interface via \ArrayIterator
     *
     * @return Traversable a new iterator specially created for this iteratation
     */
    public function getIterator()
    {
        return new \ArrayIterator(\Account\ProfileDetailsArrayConverter::toArray($this));
    }
}