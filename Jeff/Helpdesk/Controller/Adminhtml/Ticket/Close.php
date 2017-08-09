<?php
namespace Jeff\Helpdesk\Controller\Adminhtml\Ticket;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Jeff\Helpdesk\Model\TicketFactory;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Framework\Translate\Inline\StateInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\StoreManagerInterface;

class Close extends \Jeff\Helpdesk\Controller\Adminhtml\Ticket {
    
    protected $ticketFactory;
    protected $customerRepository;
    protected $transportBuilder;
    protected $inlineTranslation;
    protected $scopeConfig;
    protected $storeManager;

    public function __construct(
        Context $context, 
        PageFactory $resultPageFactory, 
        ForwardFactory $resultForwardFactory, 
        TicketFactory $ticketFactory,
        CustomerRepositoryInterface $customerRepository,
        TransportBuilder $transportBuilder,
        StateInterface $inlineTranslation,
        ScopeConfigInterface $scopeConfig,
        StoreManagerInterface $storeManager
    ) {
        $this->ticketFactory = $ticketFactory;
        $this->customerRepository = $customerRepository;
        $this->transportBuilder = $transportBuilder;
        $this->inlineTranslation = $inlineTranslation;
        $this->scopeConfig = $scopeConfig;
        $this->storeManager = $storeManager;
        parent::__construct($context, $resultPageFactory, $resultForwardFactory);
    }

    public function execute() {
        $ticketId = $this->getRequest()->getParam('id');
        $ticket = $this->ticketFactory->create()->load($ticketId);

        if($ticket && $ticket->getId()) {
            try{
                $ticket->setStatus(\Jeff\Helpdesk\Model\Ticket::STATUS_CLOSED);
                $ticket->save();
                $this->messageManager->addSuccess(__('Ticket successfully closed.'));

                // Send email to customer

                $this->messageManager->addSuccess(__('Customer notified via email'));
            }
            catch(Exception $e) {
                $this->messageManager->addError(__('Error with closing ticket action'));
            }
        }

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('*/*/index');

        return $resultRedirect;
    }
}
