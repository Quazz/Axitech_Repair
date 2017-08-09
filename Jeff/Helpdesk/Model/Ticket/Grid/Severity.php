<?php
namespace Jeff\Helpdesk\Model\Ticket\Grid;

use Magento\Framework\Option\ArrayInterface;

class Severity implements ArrayInterface {
    public function toOptionArray() {
        return \Jeff\Helpdesk\Model\Ticket::getSeveritiesOptionArray();
    }
}
