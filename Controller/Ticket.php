<?php
namespace Axitech\Repair\Controller;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use Magento\Customer\Model\Session as CustomerSession;

abstract class Ticket extends Action {
    protected $customerSession;

    public function __construct(Context $context, CustomerSession $customerSession) {
        $this->customerSession = $customerSession;
        parent::__construct($context);
    }
    
    public function dispatch(RequestInterface $request) {
        if(!$this->customerSession->authenticate()) {
            $this->_actionFlag->set('', 'no-dispatch', true);

            if(!$this->customerSession->getBeforeUrl()) {
                $this->customerSession->setBeforeUrl($this->_redirect->getRefererUrl());
            }
        }

        return parent::dispatch($request);
    }
}
/*
our controller loads the customer session object through tis constructor. The customer session object is then
used within the dispatch method to check if the customer is authenticated or not. 
*/
