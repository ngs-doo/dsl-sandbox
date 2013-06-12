<?php
namespace Todo\Task;

require_once __DIR__.'/findRecentJsonConverter.php';
require_once __DIR__.'/findRecentArrayConverter.php';
require_once __DIR__.'/../Task.php';

/**
 * Generated from NGS DSL
 *
 * @property int $days an integer number
 * @property int $minPriority an integer number, can be null
 * @property int $maxPriority an integer number, can be null
 *
 * @package Todo
 * @version 0.9.9 beta
 */
class findRecent extends \NGS\Patterns\Specification
{
    protected $days;
    protected $minPriority;
    protected $maxPriority;

    /**
     * Constructs object using a key-property array or instance of class "Todo\Task\findRecent"
     *
     * @param array|void $data key-property array or instance of class "Todo\Task\findRecent" or pass void to provide all fields with defaults
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
        if(!array_key_exists('days', $data))
            $data['days'] = 0; // an integer number
    }

    /**
     * Constructs object from a key-property array
     *
     * @param array $data key-property array
     */
    private function fromArray(array $data)
    {
        $this->provideDefaults($data);

        if (array_key_exists('days', $data))
            $this->setDays($data['days']);
        unset($data['days']);
        if (array_key_exists('minPriority', $data))
            $this->setMinPriority($data['minPriority']);
        unset($data['minPriority']);
        if (array_key_exists('maxPriority', $data))
            $this->setMaxPriority($data['maxPriority']);
        unset($data['maxPriority']);

        if (count($data) !== 0 && \NGS\Utils::WarningsAsErrors())
            throw new \InvalidArgumentException('Superflous array keys found in "Todo\Task\findRecent" constructor: '.implode(', ', array_keys($data)));
    }

// ============================================================================

    /**
     * @return an integer number
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * @return an integer number, can be null
     */
    public function getMinPriority()
    {
        return $this->minPriority;
    }

    /**
     * @return an integer number, can be null
     */
    public function getMaxPriority()
    {
        return $this->maxPriority;
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
        if ($name === 'days')
            return $this->getDays(); // an integer number
        if ($name === 'minPriority')
            return $this->getMinPriority(); // an integer number, can be null
        if ($name === 'maxPriority')
            return $this->getMaxPriority(); // an integer number, can be null

        throw new \InvalidArgumentException('Property "'.$name.'" in class "Todo\Task\findRecent" does not exist and could not be retrieved!');
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
        if ($name === 'days')
            return true; // an integer number (always set)
        if ($name === 'minPriority')
            return $this->getMinPriority() !== null; // an integer number, can be null
        if ($name === 'maxPriority')
            return $this->getMaxPriority() !== null; // an integer number, can be null

        return false;
    }

    /**
     * @param int $value an integer number
     *
     * @return int
     */
    public function setDays($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "days" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toInteger($value);
        $this->days = $value;
        return $value;
    }

    /**
     * @param int $value an integer number, can be null
     *
     * @return int
     */
    public function setMinPriority($value)
    {
        $value = $value !== null ? \NGS\Converter\PrimitiveConverter::toInteger($value) : null;
        $this->minPriority = $value;
        return $value;
    }

    /**
     * @param int $value an integer number, can be null
     *
     * @return int
     */
    public function setMaxPriority($value)
    {
        $value = $value !== null ? \NGS\Converter\PrimitiveConverter::toInteger($value) : null;
        $this->maxPriority = $value;
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
        if ($name === 'days')
            return $this->setDays($value); // an integer number
        if ($name === 'minPriority')
            return $this->setMinPriority($value); // an integer number, can be null
        if ($name === 'maxPriority')
            return $this->setMaxPriority($value); // an integer number, can be null
        throw new \InvalidArgumentException('Property "'.$name.'" in class "Todo\Task\findRecent" does not exist and could not be set!');
    }

    /**
     * Will unset a property if it exists, but throw an exception if it is not nullable
     *
     * @param string $name Property name to unset (set to null)
     */
    public function __unset($name)
    {
        if ($name === 'days')
            throw new \LogicException('The property "days" cannot be unset because it is non-nullable!'); // an integer number (cannot be unset)
        if ($name === 'minPriority')
            $this->setMinPriority(null);; // an integer number, can be null
        if ($name === 'maxPriority')
            $this->setMaxPriority(null);; // an integer number, can be null
    }

    public function toJson()
    {
        return \Todo\Task\findRecentJsonConverter::toJson($this);
    }

    public static function fromJson($item)
    {
        return \Todo\Task\findRecentJsonConverter::fromJson($item);
    }

    public function __toString()
    {
        return 'Todo\Task\findRecent'.$this->toJson();
    }

    public function __clone()
    {
        return \Todo\Task\findRecentArrayConverter::fromArray(\Todo\Task\findRecentArrayConverter::toArray($this));
    }

    public function toArray()
    {
        return \Todo\Task\findRecentArrayConverter::toArray($this);
    }
}