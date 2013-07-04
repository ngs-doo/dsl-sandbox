<?php
namespace Blog;

require_once __DIR__.'/CommentJsonConverter.php';
require_once __DIR__.'/CommentArrayConverter.php';
require_once __DIR__.'/Post.php';

/**
 * Generated from NGS DSL
 *
 * @property string $URI a unique object identifier (read-only)
 * @property string $email a string
 * @property string $content a string
 * @property int $PostID an integer number
 * @property int $Index an integer number
 *
 * @package Blog
 * @version 0.9.9 beta
 */
class Comment implements \IteratorAggregate
{
    protected $URI;
    protected $email;
    protected $content;
    protected $PostID;
    protected $Index;

    /**
     * Constructs object using a key-property array or instance of class "Blog\Comment"
     *
     * @param array|void $data key-property array or instance of class "Blog\Comment" or pass void to provide all fields with defaults
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
        if(!array_key_exists('email', $data))
            $data['email'] = ''; // a string
        if(!array_key_exists('content', $data))
            $data['content'] = ''; // a string
        if(!array_key_exists('PostID', $data))
            $data['PostID'] = 0; // an integer number
        if(!array_key_exists('Index', $data))
            $data['Index'] = 0; // an integer number
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
        if (array_key_exists('email', $data))
            $this->setEmail($data['email']);
        unset($data['email']);
        if (array_key_exists('content', $data))
            $this->setContent($data['content']);
        unset($data['content']);
        if (array_key_exists('PostID', $data))
            $this->setPostID($data['PostID']);
        unset($data['PostID']);
        if (array_key_exists('Index', $data))
            $this->setIndex($data['Index']);
        unset($data['Index']);

        if (count($data) !== 0 && \NGS\Utils::WarningsAsErrors())
            throw new \InvalidArgumentException('Superflous array keys found in "Blog\Comment" constructor: '.implode(', ', array_keys($data)));
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
     * @return a string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return an integer number
     */
    public function getPostID()
    {
        return $this->PostID;
    }

    /**
     * @return an integer number
     */
    public function getIndex()
    {
        return $this->Index;
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
        if ($name === 'content')
            return $this->getContent(); // a string
        if ($name === 'PostID')
            return $this->getPostID(); // an integer number
        if ($name === 'Index')
            return $this->getIndex(); // an integer number

        throw new \InvalidArgumentException('Property "'.$name.'" in class "Blog\Comment" does not exist and could not be retrieved!');
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
        if ($name === 'email')
            return true; // a string (always set)
        if ($name === 'content')
            return true; // a string (always set)
        if ($name === 'PostID')
            return true; // an integer number (always set)
        if ($name === 'Index')
            return true; // an integer number (always set)

        return false;
    }

    private static $_read_only_properties = array('URI');

    /**
     * @param string $value a string
     *
     * @return string
     */
    public function setEmail($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "email" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toString($value);
        $this->email = $value;
        return $value;
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
     * @param int $value an integer number
     *
     * @return int
     */
    public function setPostID($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "PostID" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toInteger($value);
        $this->PostID = $value;
        return $value;
    }

    /**
     * @param int $value an integer number
     *
     * @return int
     */
    public function setIndex($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "Index" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toInteger($value);
        $this->Index = $value;
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
            throw new \LogicException('Property "'.$name.'" in "Blog\Comment" cannot be set, because it is read-only!');
        if ($name === 'email')
            return $this->setEmail($value); // a string
        if ($name === 'content')
            return $this->setContent($value); // a string
        if ($name === 'PostID')
            return $this->setPostID($value); // an integer number
        if ($name === 'Index')
            return $this->setIndex($value); // an integer number
        throw new \InvalidArgumentException('Property "'.$name.'" in class "Blog\Comment" does not exist and could not be set!');
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
        if ($name === 'email')
            throw new \LogicException('The property "email" cannot be unset because it is non-nullable!'); // a string (cannot be unset)
        if ($name === 'content')
            throw new \LogicException('The property "content" cannot be unset because it is non-nullable!'); // a string (cannot be unset)
        if ($name === 'PostID')
            throw new \LogicException('The property "PostID" cannot be unset because it is non-nullable!'); // an integer number (cannot be unset)
        if ($name === 'Index')
            throw new \LogicException('The property "Index" cannot be unset because it is non-nullable!'); // an integer number (cannot be unset)
    }

    /** internal function */
    public function __setInternalcomments($parent)
    {
        $this->PostID = $parent->ID;
    }

    public function toJson()
    {
        return \Blog\CommentJsonConverter::toJson($this);
    }

    public static function fromJson($item)
    {
        return \Blog\CommentJsonConverter::fromJson($item);
    }

    public function __toString()
    {
        return 'Blog\Comment'.$this->toJson();
    }

    public function __clone()
    {
        return \Blog\CommentArrayConverter::fromArray(\Blog\CommentArrayConverter::toArray($this));
    }

    public function toArray()
    {
        return \Blog\CommentArrayConverter::toArray($this);
    }

    /**
     * Implementation of the IteratorAggregate interface via \ArrayIterator
     *
     * @return Traversable a new iterator specially created for this iteratation
     */
    public function getIterator()
    {
        return new \ArrayIterator(\Blog\CommentArrayConverter::toArray($this));
    }
}