<?php
namespace ERP;

require_once __DIR__.'/LineItemJsonConverter.php';
require_once __DIR__.'/LineItemArrayConverter.php';
require_once __DIR__.'/Product.php';
require_once __DIR__.'/Order.php';

/**
 * Generated from NGS DSL
 *
 * @property string $URI a unique object identifier (read-only)
 * @property int $productID used by reference $product (read-only)
 * @property string $productURI reference to an object of class "ERP\Product" (read-only)
 * @property \ERP\Product $product an object of class "ERP\Product"
 * @property \NGS\BigDecimal $quantity a decimal
 * @property int $OrderID an integer number
 * @property int $Index an integer number
 *
 * @package ERP
 * @version 0.9.9 beta
 */
class LineItem implements \IteratorAggregate
{
    protected $URI;
    protected $productID;
    protected $productURI;
    protected $product;
    protected $quantity;
    protected $OrderID;
    protected $Index;

    /**
     * Constructs object using a key-property array or instance of class "ERP\LineItem"
     *
     * @param array|void $data key-property array or instance of class "ERP\LineItem" or pass void to provide all fields with defaults
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
        if(!array_key_exists('productID', $data))
            $data['productID'] = 0; // an integer number
        if(!array_key_exists('quantity', $data))
            $data['quantity'] = new \NGS\BigDecimal(0); // a decimal
        if(!array_key_exists('OrderID', $data))
            $data['OrderID'] = 0; // an integer number
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
        if (array_key_exists('productID', $data))
            $this->setProductID($data['productID']);
        unset($data['productID']);
        if (array_key_exists('product', $data))
            $this->setProduct($data['product']);
        unset($data['product']);
        if(array_key_exists('productURI', $data))
            $this->productURI = \NGS\Converter\PrimitiveConverter::toString($data['productURI']);
        unset($data['productURI']);
        if (array_key_exists('quantity', $data))
            $this->setQuantity($data['quantity']);
        unset($data['quantity']);
        if (array_key_exists('OrderID', $data))
            $this->setOrderID($data['OrderID']);
        unset($data['OrderID']);
        if (array_key_exists('Index', $data))
            $this->setIndex($data['Index']);
        unset($data['Index']);

        if (count($data) !== 0 && \NGS\Utils::WarningsAsErrors())
            throw new \InvalidArgumentException('Superflous array keys found in "ERP\LineItem" constructor: '.implode(', ', array_keys($data)));
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
     * @return an integer number
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * @return a reference to an object of class "ERP\Product"
     */
    public function getProductURI()
    {
        return $this->productURI;
    }

    /**
     * @return an object of class "ERP\Product"
     */
    public function getProduct()
    {
        if ($this->productURI !== null && $this->product === null)
            $this->product = \NGS\Patterns\Repository::instance()->find('ERP\\Product', $this->productURI);
        return $this->product;
    }

    /**
     * @return a decimal
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return an integer number
     */
    public function getOrderID()
    {
        return $this->OrderID;
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
        if ($name === 'productID')
            return $this->getProductID(); // an integer number
        if ($name === 'productURI')
            return $this->getProductURI(); // a reference to an object of class "ERP\Product"
        if ($name === 'product')
            return $this->getProduct(); // an object of class "ERP\Product"
        if ($name === 'quantity')
            return $this->getQuantity(); // a decimal
        if ($name === 'OrderID')
            return $this->getOrderID(); // an integer number
        if ($name === 'Index')
            return $this->getIndex(); // an integer number

        throw new \InvalidArgumentException('Property "'.$name.'" in class "ERP\LineItem" does not exist and could not be retrieved!');
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
        if ($name === 'product')
            return true; // an object of class "ERP\Product" (always set)
        if ($name === 'quantity')
            return true; // a decimal (always set)
        if ($name === 'OrderID')
            return true; // an integer number (always set)
        if ($name === 'Index')
            return true; // an integer number (always set)

        return false;
    }

    private static $_read_only_properties = array('URI', 'productID', 'productURI');

    /**
     * @param int $value an integer number
     *
     * @return int
     */
    private function setProductID($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "productID" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toInteger($value);
        $this->productID = $value;
        return $value;
    }

    /**
     * @param \ERP\Product $value an object of class "ERP\Product"
     *
     * @return \ERP\Product
     */
    public function setProduct($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "product" cannot be set to null because it is non-nullable!');
        $value = \ERP\ProductArrayConverter::fromArray($value);
        if ($value->URI === null)
            throw new \InvalidArgumentException('Value of property "product" cannot have URI set to null because it\'s a reference! Reference values must have non-null URIs!');
        $this->product = $value;
        $this->productURI = $value->URI;
        $this->productID = $value->ID;
        return $value;
    }

    /**
     * @param \NGS\BigDecimal $value a decimal
     *
     * @return \NGS\BigDecimal
     */
    public function setQuantity($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "quantity" cannot be set to null because it is non-nullable!');
        $value = new \NGS\BigDecimal($value);
        $this->quantity = $value;
        return $value;
    }

    /**
     * @param int $value an integer number
     *
     * @return int
     */
    public function setOrderID($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "OrderID" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toInteger($value);
        $this->OrderID = $value;
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
            throw new \LogicException('Property "'.$name.'" in "ERP\LineItem" cannot be set, because it is read-only!');
        if ($name === 'product')
            return $this->setProduct($value); // an object of class "ERP\Product"
        if ($name === 'quantity')
            return $this->setQuantity($value); // a decimal
        if ($name === 'OrderID')
            return $this->setOrderID($value); // an integer number
        if ($name === 'Index')
            return $this->setIndex($value); // an integer number
        throw new \InvalidArgumentException('Property "'.$name.'" in class "ERP\LineItem" does not exist and could not be set!');
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
        if ($name === 'product')
            throw new \LogicException('The property "product" cannot be unset because it is non-nullable!'); // an object of class "ERP\Product" (cannot be unset)
        if ($name === 'quantity')
            throw new \LogicException('The property "quantity" cannot be unset because it is non-nullable!'); // a decimal (cannot be unset)
        if ($name === 'OrderID')
            throw new \LogicException('The property "OrderID" cannot be unset because it is non-nullable!'); // an integer number (cannot be unset)
        if ($name === 'Index')
            throw new \LogicException('The property "Index" cannot be unset because it is non-nullable!'); // an integer number (cannot be unset)
    }

    /** internal function */
    public function __setInternalitems($parent)
    {
        $this->OrderID = $parent->ID;
    }

    public function toJson()
    {
        return \ERP\LineItemJsonConverter::toJson($this);
    }

    public static function fromJson($item)
    {
        return \ERP\LineItemJsonConverter::fromJson($item);
    }

    public function __toString()
    {
        return 'ERP\LineItem'.$this->toJson();
    }

    public function __clone()
    {
        return \ERP\LineItemArrayConverter::fromArray(\ERP\LineItemArrayConverter::toArray($this));
    }

    public function toArray()
    {
        return \ERP\LineItemArrayConverter::toArray($this);
    }

    /**
     * Implementation of the IteratorAggregate interface via \ArrayIterator
     *
     * @return Traversable a new iterator specially created for this iteratation
     */
    public function getIterator()
    {
        return new \ArrayIterator(\ERP\LineItemArrayConverter::toArray($this));
    }
}