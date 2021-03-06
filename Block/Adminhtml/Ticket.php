<?php
namespace Axitech\Repair\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

class Ticket extends Container {
    protected function _construct() {
        $this->_controller = 'adminhtml';
        $this->_blockGroup = 'Axitech_Repair';
        $this->_headerText = __('Tickets');

        parent::_construct();
    }
}
/*
Not much is happening in the Ticket Block class here.
_controller and _blockGroup, as these serve as a sort of glue for telling our grid where to find
other possible block classes. 
*/
