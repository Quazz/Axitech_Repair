<?php
namespace Axitech\Repair\Controller\Ticket;

class Index extends \Axitech\Repair\Controller\Ticket
{

    public function execute()
    {
        $resultPage = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_PAGE);
        
        $resultPage->getConfig()->getTitle()->set(__('Repair Tickets'));
        return $resultPage;
    }
}
