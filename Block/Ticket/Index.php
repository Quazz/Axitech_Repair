<?php
namespace Axitech\Repair\Block\Ticket;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\Stdlib\DateTime;
use Magento\Customer\Model\Session as CustomerSession;
use Axitech\Repair\Model\TicketFactory;

class Index extends Template {
    /**
     * @var \Magento\Framework\Stdlib\DateTime
     */
    protected $dateTime;

    /**
     * @var \Magento\Customer\Model\Session
     */
    protected $customerSession;

    /**
     * @var \Axitech\Repair\Model\TicketFactory
     */
    protected $ticketFactory;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @parma array $data
     */
    public function __construct(Context $context, DateTime $dateTime, CustomerSession $customerSession, TicketFactory $ticketFactory, array $data =[]) {
        $this->dateTime = $dateTime;
        $this->customerSession = $customerSession;
        $this->ticketFactory = $ticketFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return \Axitech\Repair\Model\ResourceModel\Ticket\Collection
     */
    public function getTickets() {
        return $this->ticketFactory->create()
            ->getCollection()
            ->addFieldToFilter('customer_id', $this->customerSession->getcustomerId())
            ->setOrder('ticket_id', 'DESC');
    }
}
