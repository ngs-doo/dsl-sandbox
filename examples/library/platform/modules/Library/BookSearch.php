<?php
namespace Library;

require_once __DIR__.'/BookSearchJsonConverter.php';
require_once __DIR__.'/BookSearchArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * @property int $number an integer number (read-only)
 * @property string $title a string (read-only)
 *
 * @package Library
 * @version 0.9.9 beta
 */
class BookSearch extends \NGS\Patterns\Searchable
{
    protected $number;
    protected $title;

    /**
     * Constructs object using a key-property array or instance of class "Library\BookSearch"
     *
     * @param array|void $data key-property array or instance of class "Library\BookSearch" or pass void to provide all fields with defaults
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
        if(!array_key_exists('number', $data))
            $data['number'] = 0; // an integer number
        if(!array_key_exists('title', $data))
            $data['title'] = ''; // a string
    }

    /**
     * Constructs object from a key-property array
     *
     * @param array $data key-property array
     */
    private function fromArray(array $data)
    {
        $this->provideDefaults($data);

        if (isset($data['number']))
            $this->number = \NGS\Converter\PrimitiveConverter::toInteger($data['number']);
        unset($data['number']);
        if (isset($data['title']))
            $this->title = \NGS\Converter\PrimitiveConverter::toString($data['title']);
        unset($data['title']);

        if (count($data) !== 0 && \NGS\Utils::WarningsAsErrors())
            throw new \InvalidArgumentException('Superflous array keys found in "Library\BookSearch" constructor: '.implode(', ', array_keys($data)));
    }

// ============================================================================

    /**
     * @return an integer number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return a string
     */
    public function getTitle()
    {
        return $this->title;
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
        if ($name === 'number')
            return $this->getNumber(); // an integer number
        if ($name === 'title')
            return $this->getTitle(); // a string

        throw new \InvalidArgumentException('Property "'.$name.'" in class "Library\BookSearch" does not exist and could not be retrieved!');
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
        if ($name === 'number')
            return true; // an integer number (always set)
        if ($name === 'title')
            return true; // a string (always set)

        return false;
    }

    /**
     * Property setter which throws an exception because sql objects are read-only
     *
     * @param string $name Property name
     * @param mixed $value Property value
     */
    public function __set($name, $value)
    {
        throw new \LogicException('Property "'.$name.'" in "Library\BookSearch" cannot be set, because all properties in sql objects are read-only!');
    }

    /**
     * Property unsetter which throws an exception because sql objects are read-only
     *
     * @param string $name Property name to unset (set to null)
     */
    public function __unset($name)
    {
        throw new \LogicException('The property "'.$name.'" cannot be unset because sql object properties are read-only!');
    }

    public function toJson()
    {
        return \Library\BookSearchJsonConverter::toJson($this);
    }

    public static function fromJson($item)
    {
        return \Library\BookSearchJsonConverter::fromJson($item);
    }

    public function __toString()
    {
        return 'Library\BookSearch'.$this->toJson();
    }

    public function __clone()
    {
        return \Library\BookSearchArrayConverter::fromArray(\Library\BookSearchArrayConverter::toArray($this));
    }

    public function toArray()
    {
        return \Library\BookSearchArrayConverter::toArray($this);
    }

    /**
     * Find data using declared specification findByTitle
     * Search can be limited by $searchLimit and $searchOffset integer arguments
     *
     * @return array of objects that satisfy specification
     */
    public static function findByTitle($query, $searchLimit = null, $searchOffset = null)
    {
        require_once __DIR__.'/BookSearch/findByTitle.php';
        $specification = new \Library\BookSearch\findByTitle(array('query' => $query));
        return $specification->search($searchLimit, $searchOffset);
    }
}