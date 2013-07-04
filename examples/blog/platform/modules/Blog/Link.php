<?php
namespace Blog;

require_once __DIR__.'/LinkJsonConverter.php';
require_once __DIR__.'/LinkArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * @property string $url a string
 * @property \NGS\Timestamp $lastUpdated a timestamp with time zone
 *
 * @package Blog
 * @version 0.9.9 beta
 */
class Link implements \IteratorAggregate
{
    protected $url;
    protected $lastUpdated;

    /**
     * Constructs object using a key-property array or instance of class "Blog\Link"
     *
     * @param array|void $data key-property array or instance of class "Blog\Link" or pass void to provide all fields with defaults
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
        if(!array_key_exists('url', $data))
            $data['url'] = ''; // a string
        if(!array_key_exists('lastUpdated', $data))
            $data['lastUpdated'] = new \NGS\Timestamp(); // a timestamp with time zone
    }

    /**
     * Constructs object from a key-property array
     *
     * @param array $data key-property array
     */
    private function fromArray(array $data)
    {
        $this->provideDefaults($data);

        if (array_key_exists('url', $data))
            $this->setUrl($data['url']);
        unset($data['url']);
        if (array_key_exists('lastUpdated', $data))
            $this->setLastUpdated($data['lastUpdated']);
        unset($data['lastUpdated']);

        if (count($data) !== 0 && \NGS\Utils::WarningsAsErrors())
            throw new \InvalidArgumentException('Superflous array keys found in "Blog\Link" constructor: '.implode(', ', array_keys($data)));
    }

// ============================================================================

    /**
     * @return a string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return a timestamp with time zone
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
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
        if ($name === 'url')
            return $this->getUrl(); // a string
        if ($name === 'lastUpdated')
            return $this->getLastUpdated(); // a timestamp with time zone

        throw new \InvalidArgumentException('Property "'.$name.'" in class "Blog\Link" does not exist and could not be retrieved!');
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
        if ($name === 'url')
            return true; // a string (always set)
        if ($name === 'lastUpdated')
            return true; // a timestamp with time zone (always set)

        return false;
    }

    /**
     * @param string $value a string
     *
     * @return string
     */
    public function setUrl($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "url" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toString($value);
        $this->url = $value;
        return $value;
    }

    /**
     * @param \NGS\Timestamp $value a timestamp with time zone
     *
     * @return \NGS\Timestamp
     */
    public function setLastUpdated($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "lastUpdated" cannot be set to null because it is non-nullable!');
        $value = new \NGS\Timestamp($value);
        $this->lastUpdated = $value;
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
        if ($name === 'url')
            return $this->setUrl($value); // a string
        if ($name === 'lastUpdated')
            return $this->setLastUpdated($value); // a timestamp with time zone
        throw new \InvalidArgumentException('Property "'.$name.'" in class "Blog\Link" does not exist and could not be set!');
    }

    /**
     * Will unset a property if it exists, but throw an exception if it is not nullable
     *
     * @param string $name Property name to unset (set to null)
     */
    public function __unset($name)
    {
        if ($name === 'url')
            throw new \LogicException('The property "url" cannot be unset because it is non-nullable!'); // a string (cannot be unset)
        if ($name === 'lastUpdated')
            throw new \LogicException('The property "lastUpdated" cannot be unset because it is non-nullable!'); // a timestamp with time zone (cannot be unset)
    }

    public function toJson()
    {
        return \Blog\LinkJsonConverter::toJson($this);
    }

    public static function fromJson($item)
    {
        return \Blog\LinkJsonConverter::fromJson($item);
    }

    public function __toString()
    {
        return 'Blog\Link'.$this->toJson();
    }

    public function __clone()
    {
        return \Blog\LinkArrayConverter::fromArray(\Blog\LinkArrayConverter::toArray($this));
    }

    public function toArray()
    {
        return \Blog\LinkArrayConverter::toArray($this);
    }

    /**
     * Implementation of the IteratorAggregate interface via \ArrayIterator
     *
     * @return Traversable a new iterator specially created for this iteratation
     */
    public function getIterator()
    {
        return new \ArrayIterator(\Blog\LinkArrayConverter::toArray($this));
    }
}