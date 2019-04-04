<?php
namespace Axitech\Repair\Controller\Adminhtml\Ticket;

class Grid extends \Axitech\Repair\Controller\Adminhtml\Ticket {
    public function execute() {
        $this->_view->loadLayout(false);
        $this->_view->renderLayout();
    }
}
/*
However, if we now try to use sorting or filtering, we would get a broken layout.
This is because based on arguments defined under the jeff_helpdesk_ticket_grid_block.xml file,
we are missing the controller Grid action. 
When we use sorting or filtering, the AJAX request hits the Index controller Grid Action.
The code within thex execute method simplye calls the loadLayout(false) method to prevent
the entire layout loading, making it load only the bits defined under the jeff_helpdesk_ticket_grid.xml fiel.
*/
