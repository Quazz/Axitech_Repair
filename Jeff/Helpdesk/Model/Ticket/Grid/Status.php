<?php
namespace Jeff\Helpdesk\Model\Ticket\Grid;

use Magento\Framework\Option\ArrayInterface;

class Status implements ArrayInterface {
    public function toOptionArray() {
        return \Jeff\Helpdesk\Model\Ticket::getStatusesOptionArray();
    }
}
