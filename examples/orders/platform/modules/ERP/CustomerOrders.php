<?php
namespace ERP;

require_once __DIR__.'/CustomerOrdersJsonConverter.php';
require_once __DIR__.'/CustomerOrdersArrayConverter.php';

/**
 * Generated from NGS DSL
 *
 * @property string $ssn a string
 * @property int $totalOrder an integer number
 * @property \ERP\Customer $customer an object of class "ERP\Customer", will be calculated by server
 * @property array $orders an array of objects of class "ERP\Order", will be calculated by server
 *
 * @package ERP
 * @version 0.9.9 beta
 */
class CustomerOrders
{
    protected $restHttp;
    protected $ssn;
    protected $totalOrder;
    protected $customer;
    protected $orders;

    /**
     * Constructs object using a key-property array or instance of class "ERP\CustomerOrders"
     *
     * @param array|void $data key-property array or instance of class "ERP\CustomerOrders" or pass void to provide all fields with defaults
     */
    public function __construct($data = array(), \NGS\Client\RestHttp $restHttp = null)
    {
        if ($restHttp === null)
            $restHttp = \NGS\Client\RestHttp::instance();
        $this->restHttp = $restHttp;
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
        if(!array_key_exists('ssn', $data))
            $data['ssn'] = ''; // a string
        if(!array_key_exists('totalOrder', $data))
            $data['totalOrder'] = 0; // an integer number
    }

    /**
     * Constructs object from a key-property array
     *
     * @param array $data key-property array
     */
    private function fromArray(array $data)
    {
        $this->provideDefaults($data);

        if (isset($data['ssn']))
            $this->ssn = \NGS\Converter\PrimitiveConverter::toString($data['ssn']);
        unset($data['ssn']);
        if (isset($data['totalOrder']))
            $this->totalOrder = \NGS\Converter\PrimitiveConverter::toInteger($data['totalOrder']);
        unset($data['totalOrder']);
        if (isset($data['customer']))
            $this->customer = \ERP\CustomerArrayConverter::fromArray($data['customer']);
        unset($data['customer']);
        if (isset($data['orders']))
            $this->orders = \ERP\OrderArrayConverter::fromArrayList($data['orders'], false);
        unset($data['orders']);

        if (count($data) !== 0 && \NGS\Utils::WarningsAsErrors())
            throw new \InvalidArgumentException('Superflous array keys found in "ERP\CustomerOrders" constructor: '.implode(', ', array_keys($data)));
    }

// ============================================================================

    /**
     * @return a string
     */
    public function getSsn()
    {
        return $this->ssn;
    }

    /**
     * @return an integer number
     */
    public function getTotalOrder()
    {
        return $this->totalOrder;
    }

    /**
     * @return an object of class "ERP\Customer", can be null
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @return an array of objects of class "ERP\Order", will be calculated by server, can be null
     */
    public function getOrders()
    {
        return $this->orders;
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
        if ($name === 'ssn')
            return $this->getSsn(); // a string
        if ($name === 'totalOrder')
            return $this->getTotalOrder(); // an integer number
        if ($name === 'customer')
            return $this->getCustomer(); // an object of class "ERP\Customer", can be null
        if ($name === 'orders')
            return $this->getOrders(); // an array of objects of class "ERP\Order", will be calculated by server, can be null

        throw new \InvalidArgumentException('Property "'.$name.'" in class "ERP\CustomerOrders" does not exist and could not be retrieved!');
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
        if ($name === 'ssn')
            return true; // a string (always set)
        if ($name === 'totalOrder')
            return true; // an integer number (always set)
        if ($name === 'customer')
            return true; // an object of class "ERP\Customer" (always set)
        if ($name === 'orders')
            return true; // an array of objects of class "ERP\Order", will be calculated by server (always set)

        return false;
    }

    /**
     * @param string $value a string
     *
     * @return string
     */
    public function setSsn($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "ssn" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toString($value);
        $this->ssn = $value;
        return $value;
    }

    /**
     * @param int $value an integer number
     *
     * @return int
     */
    public function setTotalOrder($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "totalOrder" cannot be set to null because it is non-nullable!');
        $value = \NGS\Converter\PrimitiveConverter::toInteger($value);
        $this->totalOrder = $value;
        return $value;
    }

    /**
     * @param \ERP\Customer $value an object of class "ERP\Customer"
     *
     * @return \ERP\Customer
     */
    public function setCustomer($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "customer" cannot be set to null because it is non-nullable!');
        $value = \ERP\CustomerArrayConverter::fromArray($value);
        $this->customer = $value;
        return $value;
    }

    /**
     * @param array $value an array of objects of class "ERP\Order", will be calculated by server
     *
     * @return array
     */
    public function setOrders($value)
    {
        if ($value === null)
            throw new \InvalidArgumentException('Property "orders" cannot be set to null because it is non-nullable!');
        $value = \ERP\OrderArrayConverter::fromArrayList($value, false);
        $this->orders = $value;
        return $value;
    }

    /**
     * Property setter which checks for invalid access to report properties and enforces proper type checks
     *
     * @param string $name Property name
     * @param mixed $value Property value
     */
    public function __set($name, $value)
    {
        if ($name === 'ssn')
            return $this->setSsn($value); // a string
        if ($name === 'totalOrder')
            return $this->setTotalOrder($value); // an integer number
        if ($name === 'customer')
            return $this->setCustomer($value); // an object of class "ERP\Customer"
        if ($name === 'orders')
            return $this->setOrders($value); // an array of objects of class "ERP\Order", will be calculated by server
        throw new \InvalidArgumentException('Property "'.$name.'" in class "ERP\CustomerOrders" does not exist and could not be set!');
    }

    /**
     * Will unset a property if it exists, but throw an exception if it is not nullable
     *
     * @param string $name Property name to unset (set to null)
     */
    public function __unset($name)
    {
        if ($name === 'ssn')
            throw new \LogicException('The property "ssn" cannot be unset because it is non-nullable!'); // a string (cannot be unset)
        if ($name === 'totalOrder')
            throw new \LogicException('The property "totalOrder" cannot be unset because it is non-nullable!'); // an integer number (cannot be unset)
        if ($name === 'customer')
            throw new \LogicException('The property "customer" cannot be unset because it is non-nullable!'); // an object of class "ERP\Customer" (cannot be unset)
        if ($name === 'orders')
            throw new \LogicException('The property "orders" cannot be unset because it is non-nullable!'); // an array of objects of class "ERP\Order", will be calculated by server (cannot be unset)
    }

    /**
     * Populate specified report ERP\CustomerOrders
     *
     * @return populated object ERP\CustomerOrders
     */
    public function populate()
    {
        $proxy = new \NGS\Client\ReportingProxy($this->restHttp);
        $value = $proxy->populateReport($this);
        $this->customer = $value->customer;
        $this->orders = $value->orders;
        return $this;
    }

    /**
     * Create specified report buildReports
     *
     * @return binary object representing requested document Orders.docx populated with data
     */
    public function buildReports()
    {
        $proxy = new \NGS\Client\ReportingProxy($this->restHttp);
        return $proxy->createReport($this, 'buildReports');
    }

    /**
     * Create specified report buildReportsPdf
     *
     * @return binary object representing requested document Orders.docx populated with data and converted to pdf
     */
    public function buildReportsPdf()
    {
        $proxy = new \NGS\Client\ReportingProxy($this->restHttp);
        return $proxy->createReport($this, 'buildReportsPdf');
    }

    public function toJson()
    {
        return \ERP\CustomerOrdersJsonConverter::toJson($this);
    }

    public static function fromJson($item)
    {
        return \ERP\CustomerOrdersJsonConverter::fromJson($item);
    }

    public function __toString()
    {
        return 'ERP\CustomerOrders'.$this->toJson();
    }

    public function __clone()
    {
        return \ERP\CustomerOrdersArrayConverter::fromArray(\ERP\CustomerOrdersArrayConverter::toArray($this));
    }

    public function toArray()
    {
        return \ERP\CustomerOrdersArrayConverter::toArray($this);
    }
}