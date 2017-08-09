<?php
namespace Jeff\Helpdesk\Model\ResourceModel\Ticket;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection {
    protected function _construct() {
        $this->_init('Jeff\Helpdesk\Model\Ticket', 'Jeff\Helpdesk\Model\ResourceModel\Ticket');
    }
}
