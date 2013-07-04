<?php
namespace Blog;

require_once __DIR__.'/TagJsonConverter.php';
require_once __DIR__.'/TagArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * @property string $URI a unique object identifier (read-only)
 * @property string $code a string
 *
 * @package Blog
 * @version 0.9.9 beta
 */
class Tag extends \NGS\Patterns\AggregateRoot implements \IteratorAggregate
{
    protected $URI;
    protected $code;

    /**
     * Constructs object using a key-property array or instance of class "Blog\Tag"
     *
     * @param array|void $data key-property array or instance of class "Blog\Tag" or pass void to provide all fields with defaults
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
        if(!array_key_exists('code', $data))
            $data['code'] = ''; // a string
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
        if (array_key_exists('code', $data))
            $this->setCode($data['code']);
        unset($data['code']);

        if (count($data) !== 0 && \NGS\Utils::WarningsAsErrors())
            throw new \InvalidArgumentException('Superflous array keys found in "Blog\Tag" constructor: '.implode(', ', array_keys($data)));
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
    public function getCode()
    {
        return $this->code;
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
        if ($name === 'code')
            return $this->getCode(); // a string

        throw new \InvalidArgumentException('Property "'.$name.'" in class "Blog\Tag" does not exist and could not be retrieved!');
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
        if ($name === 'code')
            return true; // a string (always set)

        return false;
    }

    private static $_read_only_properties = array('URI');

    /**
     * @param string $value a string
     *
     * @return string
     */
    public function setCode($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "code" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toString($value);
        $this->code = $value;
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
            throw new \LogicException('Property "'.$name.'" in "Blog\Tag" cannot be set, because it is read-only!');
        if ($name === 'code')
            return $this->setCode($value); // a string
        throw new \InvalidArgumentException('Property "'.$name.'" in class "Blog\Tag" does not exist and could not be set!');
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
        if ($name === 'code')
            throw new \LogicException('The property "code" cannot be unset because it is non-nullable!'); // a string (cannot be unset)
    }

    /**
     * Create or update Blog\Tag instance (server call)
     *
     * @return modified instance object
     */
    public function persist()
    {

        $newObject = parent::persist();
        $this->updateWithAnother($newObject);

        return $this;
    }

    private function updateWithAnother(\Blog\Tag $result)
    {
        $this->URI = $result->URI;

        $this->code = $result->code;
    }

    public function toJson()
    {
        return \Blog\TagJsonConverter::toJson($this);
    }

    public static function fromJson($item)
    {
        return \Blog\TagJsonConverter::fromJson($item);
    }

    public function __toString()
    {
        return 'Blog\Tag'.$this->toJson();
    }

    public function __clone()
    {
        return \Blog\TagArrayConverter::fromArray(\Blog\TagArrayConverter::toArray($this));
    }

    public function toArray()
    {
        return \Blog\TagArrayConverter::toArray($this);
    }

    /**
     * Implementation of the IteratorAggregate interface via \ArrayIterator
     *
     * @return Traversable a new iterator specially created for this iteratation
     */
    public function getIterator()
    {
        return new \ArrayIterator(\Blog\TagArrayConverter::toArray($this));
    }
}