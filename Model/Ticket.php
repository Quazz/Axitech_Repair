<?php
namespace Jeff\Helpdesk\Model;

class Ticket extends \Magento\Framework\Model\AbstractModel {
    const STATUS_OPENED = 1;
    const STATUS_CLOSED = 2;

    const SEVERITY_LOW = 1;
    const SEVERITY_MEDIUM = 2;
    const SEVERITY_HIGH = 3;


    protected static $statusesOptions = [self::STATUS_OPENED=>'Opened', self::STATUS_CLOSED=>'Closed'];

    protected static $severitiesOptions = [self::SEVERITY_LOW=>'Low', self::SEVERITY_MEDIUM=>'Medium', self::SEVERITY_HIGH=>'High'];

    /**
     * Initialize resource model
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Jeff\Helpdesk\Model\ResourceModel\Ticket');
    }

    public static function getSeveritiesOptionArray() {
        return self::$severitiesOptions;
    }

    public static function getStatusesOptionArray() {
        return self::$statusesOptions;
    } 

    public function getStatusAsLabel() {
        return self::$statusesOptions[$this->getStatus()];
    }

    public  function getSeverityAsLabel() {
        return self::$severitiesOptions[$this->getSeverity()];
    }
}
/*
Reading the proceding code, we see it extends the \Magento\Framework\Model\AbstractModel class, which 
further extends  the \Magento\Framework\Object class.

This brings a lot of extra methods into our Ticket model class, such as load, delete, save, toArray, toJson, toString, toXml.
*/
