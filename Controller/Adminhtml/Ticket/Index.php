<?php
namespace Axitech\Repair\Controller\Adminhtml\Ticket;
class Index extends \Axitech\Repair\Controller\Adminhtml\Ticket
{
    public function execute()
    {
        //return $this->resultPageFactory->create();  
        if($this->getRequest()->getQuery('ajax')) {
            $resultForward = $this->resultForwardFactory->create();
            $resultForward->forward('grid');
            return $resultForward;
        }
        $resultPage = $this->resultPageFactory->create();

        $resultPage->setActiveMenu('Axitech_Repair::ticket_manage');
        $resultPage->getConfig()->getTitle()->prepend(__('Tickets'));

        $resultPage->addBreadcrumb(__('Tickets'), __('Tickets'));
        $resultPage->addBreadcrumb(__('Manage Tickets'), __('Manage Tickets'));


        return $resultPage;
    }
}
