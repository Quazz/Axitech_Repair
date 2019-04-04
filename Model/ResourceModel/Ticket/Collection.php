<?php
namespace Axitech\Repair\Model\ResourceModel\Ticket;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection {
    protected function _construct() {
        $this->_init('Axitech\Repair\Model\Ticket', 'Axitech\Repair\ResourceModel\Ticket');
    }
}
