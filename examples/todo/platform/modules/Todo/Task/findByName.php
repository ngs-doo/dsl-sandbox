<?php
namespace Todo\Task;

require_once __DIR__.'/findByNameJsonConverter.php';
require_once __DIR__.'/findByNameArrayConverter.php';
require_once __DIR__.'/../Task.php';

/**
 * Generated from NGS DSL
 *
 * @property string $query a string
 *
 * @package Todo
 * @version 0.9.9 beta
 */
class findByName extends \NGS\Patterns\Specification
{
    protected $query;

    /**
     * Constructs object using a key-property array or instance of class "Todo\Task\findByName"
     *
     * @param array|void $data key-property array or instance of class "Todo\Task\findByName" or pass void to provide all fields with defaults
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
        if(!array_key_exists('query', $data))
            $data['query'] = ''; // a string
    }

    /**
     * Constructs object from a key-property array
     *
     * @param array $data key-property array
     */
    private function fromArray(array $data)
    {
        $this->provideDefaults($data);

        if (array_key_exists('query', $data))
            $this->setQuery($data['query']);
        unset($data['query']);

        if (count($data) !== 0 && \NGS\Utils::WarningsAsErrors())
            throw new \InvalidArgumentException('Superflous array keys found in "Todo\Task\findByName" constructor: '.implode(', ', array_keys($data)));
    }

// ============================================================================

    /**
     * @return a string
     */
    public function getQuery()
    {
        return $this->query;
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
        if ($name === 'query')
            return $this->getQuery(); // a string

        throw new \InvalidArgumentException('Property "'.$name.'" in class "Todo\Task\findByName" does not exist and could not be retrieved!');
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
        if ($name === 'query')
            return true; // a string (always set)

        return false;
    }

    /**
     * @param string $value a string
     *
     * @return string
     */
    public function setQuery($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "query" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toString($value);
        $this->query = $value;
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
        if ($name === 'query')
            return $this->setQuery($value); // a string
        throw new \InvalidArgumentException('Property "'.$name.'" in class "Todo\Task\findByName" does not exist and could not be set!');
    }

    /**
     * Will unset a property if it exists, but throw an exception if it is not nullable
     *
     * @param string $name Property name to unset (set to null)
     */
    public function __unset($name)
    {
        if ($name === 'query')
            throw new \LogicException('The property "query" cannot be unset because it is non-nullable!'); // a string (cannot be unset)
    }

    public function toJson()
    {
        return \Todo\Task\findByNameJsonConverter::toJson($this);
    }

    public static function fromJson($item)
    {
        return \Todo\Task\findByNameJsonConverter::fromJson($item);
    }

    public function __toString()
    {
        return 'Todo\Task\findByName'.$this->toJson();
    }

    public function __clone()
    {
        return \Todo\Task\findByNameArrayConverter::fromArray(\Todo\Task\findByNameArrayConverter::toArray($this));
    }

    public function toArray()
    {
        return \Todo\Task\findByNameArrayConverter::toArray($this);
    }
}