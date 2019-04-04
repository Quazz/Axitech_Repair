<?php
namespace Axitech\Repair\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb; 

class Ticket extends AbstractDb {
    protected function _construct() {
        $this->_init('axitech_repair_ticket', 'ticket_id');
    }
}
