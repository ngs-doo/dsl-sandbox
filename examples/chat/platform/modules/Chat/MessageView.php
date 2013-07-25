<?php
namespace Chat;

require_once __DIR__.'/MessageViewJsonConverter.php';
require_once __DIR__.'/MessageViewArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * @property string $URI a unique object identifier (read-only)
 * @property \NGS\Timestamp $created a timestamp with time zone (read-only)
 * @property string $content a string (read-only)
 * @property int $fromID an integer number (read-only)
 * @property string $fromName a string (read-only)
 *
 * @package Chat
 * @version 0.9.9 beta
 */
class MessageView extends \NGS\Patterns\Identifiable implements \IteratorAggregate
{
    protected $URI;
    protected $created;
    protected $content;
    protected $fromID;
    protected $fromName;

    /**
     * Constructs object using a key-property array or instance of class "Chat\MessageView"
     *
     * @param array|void $data key-property array or instance of class "Chat\MessageView" or pass void to provide all fields with defaults
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
        if(!array_key_exists('created', $data))
            $data['created'] = new \NGS\Timestamp(); // a timestamp with time zone
        if(!array_key_exists('content', $data))
            $data['content'] = ''; // a string
        if(!array_key_exists('fromID', $data))
            $data['fromID'] = 0; // an integer number
        if(!array_key_exists('fromName', $data))
            $data['fromName'] = ''; // a string
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
        if (isset($data['created']))
            $this->created = new \NGS\Timestamp($data['created']);
        unset($data['created']);
        if (isset($data['content']))
            $this->content = \NGS\Converter\PrimitiveConverter::toString($data['content']);
        unset($data['content']);
        if (isset($data['fromID']))
            $this->fromID = \NGS\Converter\PrimitiveConverter::toInteger($data['fromID']);
        unset($data['fromID']);
        if (isset($data['fromName']))
            $this->fromName = \NGS\Converter\PrimitiveConverter::toString($data['fromName']);
        unset($data['fromName']);

        if (count($data) !== 0 && \NGS\Utils::WarningsAsErrors())
            throw new \InvalidArgumentException('Superflous array keys found in "Chat\MessageView" constructor: '.implode(', ', array_keys($data)));
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
     * @return a timestamp with time zone
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return a string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return an integer number
     */
    public function getFromID()
    {
        return $this->fromID;
    }

    /**
     * @return a string
     */
    public function getFromName()
    {
        return $this->fromName;
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
        if ($name === 'created')
            return $this->getCreated(); // a timestamp with time zone
        if ($name === 'content')
            return $this->getContent(); // a string
        if ($name === 'fromID')
            return $this->getFromID(); // an integer number
        if ($name === 'fromName')
            return $this->getFromName(); // a string

        throw new \InvalidArgumentException('Property "'.$name.'" in class "Chat\MessageView" does not exist and could not be retrieved!');
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
        if ($name === 'created')
            return true; // a timestamp with time zone (always set)
        if ($name === 'content')
            return true; // a string (always set)
        if ($name === 'fromID')
            return true; // an integer number (always set)
        if ($name === 'fromName')
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
        throw new \LogicException('Property "'.$name.'" in "Chat\MessageView" cannot be set, because all properties in snowflake are read-only!');
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
        return \Chat\MessageViewJsonConverter::toJson($this);
    }

    public static function fromJson($item)
    {
        return \Chat\MessageViewJsonConverter::fromJson($item);
    }

    public function __toString()
    {
        return 'Chat\MessageView'.$this->toJson();
    }

    public function __clone()
    {
        return \Chat\MessageViewArrayConverter::fromArray(\Chat\MessageViewArrayConverter::toArray($this));
    }

    public function toArray()
    {
        return \Chat\MessageViewArrayConverter::toArray($this);
    }

    /**
     * Implementation of the IteratorAggregate interface via \ArrayIterator
     *
     * @return Traversable a new iterator specially created for this iteratation
     */
    public function getIterator()
    {
        return new \ArrayIterator(\Chat\MessageViewArrayConverter::toArray($this));
    }
}