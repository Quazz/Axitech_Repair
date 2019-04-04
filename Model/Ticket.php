<?php
namespace Axitech\Repair\Model;

class Ticket extends \Magento\Framework\Model\AbstractModel {
    const STATUS_OPENED = 1;
    const STATUS_CLOSED = 2;
    const STATUS_DIAGNOSE = 3;
    const STATUS_PART = 4;
    const STATUS_PICKUP = 5;
    const STATUS_INPROGRESS = 6;

    protected static $statusesOptions = [self::STATUS_OPENED=>'Opened', self::STATUS_CLOSED=>'Closed', self::STATUS_DIAGNOSE=>'Waiting for Diagnosis', self::STATUS_PART=>'Waiting for Parts', self::STATUS_PICKUP=>'Ready for Pickup', self::STATUS_INPROGRESS=>'In progress'];

    /**
     * Initialize resource model
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Axitech\Repair\Model\ResourceModel\Ticket');
    }

    public static function getStatusesOptionArray() {
        return self::$statusesOptions;
    } 

    public function getStatusAsLabel() {
        return self::$statusesOptions[$this->getStatus()];
    }
}
/*
Reading the proceding code, we see it extends the \Magento\Framework\Model\AbstractModel class, which 
further extends  the \Magento\Framework\Object class.

This brings a lot of extra methods into our Ticket model class, such as load, delete, save, toArray, toJson, toString, toXml.
*/
