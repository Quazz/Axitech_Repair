<?php
namespace Jeff\Helpdesk\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb; 

class Ticket extends AbstractDb {
    protected function _construct() {
        $this->_init('jeff_helpdesk_ticket', 'ticket_id');
    }
}
