<?php
namespace Todo;

require_once __DIR__.'/TaskListJsonConverter.php';
require_once __DIR__.'/TaskListArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * @property string $URI a unique object identifier (read-only)
 * @property string $name a string (read-only)
 * @property int $priority an integer number (read-only)
 * @property bool $isDone a boolean value (read-only)
 *
 * @package Todo
 * @version 0.9.9 beta
 */
class TaskList extends \NGS\Patterns\Identifiable implements \IteratorAggregate
{
    protected $URI;
    protected $name;
    protected $priority;
    protected $isDone;

    /**
     * Constructs object using a key-property array or instance of class "Todo\TaskList"
     *
     * @param array|void $data key-property array or instance of class "Todo\TaskList" or pass void to provide all fields with defaults
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
        if(!array_key_exists('name', $data))
            $data['name'] = ''; // a string
        if(!array_key_exists('priority', $data))
            $data['priority'] = 0; // an integer number
        if(!array_key_exists('isDone', $data))
            $data['isDone'] = false; // a boolean value
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
        if (isset($data['name']))
            $this->name = \NGS\Converter\PrimitiveConverter::toString($data['name']);
        unset($data['name']);
        if (isset($data['priority']))
            $this->priority = \NGS\Converter\PrimitiveConverter::toInteger($data['priority']);
        unset($data['priority']);
        if (isset($data['isDone']))
            $this->isDone = \NGS\Converter\PrimitiveConverter::toBoolean($data['isDone']);
        unset($data['isDone']);

        if (count($data) !== 0 && \NGS\Utils::WarningsAsErrors())
            throw new \InvalidArgumentException('Superflous array keys found in "Todo\TaskList" constructor: '.implode(', ', array_keys($data)));
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return an integer number
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @return a boolean value
     */
    public function getIsDone()
    {
        return $this->isDone;
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
        if ($name === 'name')
            return $this->getName(); // a string
        if ($name === 'priority')
            return $this->getPriority(); // an integer number
        if ($name === 'isDone')
            return $this->getIsDone(); // a boolean value

        throw new \InvalidArgumentException('Property "'.$name.'" in class "Todo\TaskList" does not exist and could not be retrieved!');
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
        if ($name === 'name')
            return true; // a string (always set)
        if ($name === 'priority')
            return true; // an integer number (always set)
        if ($name === 'isDone')
            return true; // a boolean value (always set)

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
        throw new \LogicException('Property "'.$name.'" in "Todo\TaskList" cannot be set, because all properties in snowflake are read-only!');
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
        return \Todo\TaskListJsonConverter::toJson($this);
    }

    public static function fromJson($item)
    {
        return \Todo\TaskListJsonConverter::fromJson($item);
    }

    public function __toString()
    {
        return 'Todo\TaskList'.$this->toJson();
    }

    public function __clone()
    {
        return \Todo\TaskListArrayConverter::fromArray(\Todo\TaskListArrayConverter::toArray($this));
    }

    public function toArray()
    {
        return \Todo\TaskListArrayConverter::toArray($this);
    }

    /**
     * Implementation of the IteratorAggregate interface via \ArrayIterator
     *
     * @return Traversable a new iterator specially created for this iteratation
     */
    public function getIterator()
    {
        return new \ArrayIterator(\Todo\TaskListArrayConverter::toArray($this));
    }
}