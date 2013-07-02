<?php
namespace Library;

require_once __DIR__.'/FootnoteJsonConverter.php';
require_once __DIR__.'/FootnoteArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * @property string $content a string
 *
 * @package Library
 * @version 0.9.9 beta
 */
class Footnote implements \IteratorAggregate
{
    protected $content;

    /**
     * Constructs object using a key-property array or instance of class "Library\Footnote"
     *
     * @param array|void $data key-property array or instance of class "Library\Footnote" or pass void to provide all fields with defaults
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
        if(!array_key_exists('content', $data))
            $data['content'] = ''; // a string
    }

    /**
     * Constructs object from a key-property array
     *
     * @param array $data key-property array
     */
    private function fromArray(array $data)
    {
        $this->provideDefaults($data);

        if (array_key_exists('content', $data))
            $this->setContent($data['content']);
        unset($data['content']);

        if (count($data) !== 0 && \NGS\Utils::WarningsAsErrors())
            throw new \InvalidArgumentException('Superflous array keys found in "Library\Footnote" constructor: '.implode(', ', array_keys($data)));
    }

// ============================================================================

    /**
     * @return a string
     */
    public function getContent()
    {
        return $this->content;
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
        if ($name === 'content')
            return $this->getContent(); // a string

        throw new \InvalidArgumentException('Property "'.$name.'" in class "Library\Footnote" does not exist and could not be retrieved!');
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
        if ($name === 'content')
            return true; // a string (always set)

        return false;
    }

    /**
     * @param string $value a string
     *
     * @return string
     */
    public function setContent($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "content" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toString($value);
        $this->content = $value;
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
        if ($name === 'content')
            return $this->setContent($value); // a string
        throw new \InvalidArgumentException('Property "'.$name.'" in class "Library\Footnote" does not exist and could not be set!');
    }

    /**
     * Will unset a property if it exists, but throw an exception if it is not nullable
     *
     * @param string $name Property name to unset (set to null)
     */
    public function __unset($name)
    {
        if ($name === 'content')
            throw new \LogicException('The property "content" cannot be unset because it is non-nullable!'); // a string (cannot be unset)
    }

    public function toJson()
    {
        return \Library\FootnoteJsonConverter::toJson($this);
    }

    public static function fromJson($item)
    {
        return \Library\FootnoteJsonConverter::fromJson($item);
    }

    public function __toString()
    {
        return 'Library\Footnote'.$this->toJson();
    }

    public function __clone()
    {
        return \Library\FootnoteArrayConverter::fromArray(\Library\FootnoteArrayConverter::toArray($this));
    }

    public function toArray()
    {
        return \Library\FootnoteArrayConverter::toArray($this);
    }

    /**
     * Implementation of the IteratorAggregate interface via \ArrayIterator
     *
     * @return Traversable a new iterator specially created for this iteratation
     */
    public function getIterator()
    {
        return new \ArrayIterator(\Library\FootnoteArrayConverter::toArray($this));
    }
}