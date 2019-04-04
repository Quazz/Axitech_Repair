<?php
namespace Axitech\Repair\Model\Ticket\Grid;

use Magento\Framework\Option\ArrayInterface;

class Status implements ArrayInterface {
    public function toOptionArray() {
        return \Axitech\Repair\Model\Ticket::getStatusesOptionArray();
    }
}
