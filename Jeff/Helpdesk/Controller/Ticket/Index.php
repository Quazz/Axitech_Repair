<?php
namespace Jeff\Helpdesk\Controller\Ticket;

class Index extends \Jeff\Helpdesk\Controller\Ticket
{

    public function execute()
    {
        $resultPage = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
        
        $resultPage->getConfig()->getTitle()->set(__('Help Tickets'));
        return $resultPage;
    }
}
