<?php
namespace Axitech\Repair\Block\Adminhtml\Ticket\Grid\Renderer;

use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;
use Magento\Backend\Block\Context;
use Axitech\Repair\Model\TicketFactory;

class Status extends AbstractRenderer {
    protected $ticketFactory;

    public function __construct(Context $context, TicketFactory $ticketFactory, array $data = []) {
        parent::__construct($context, $data);

        $this->ticketFactory = $ticketFactory;
    }

    public function render(\Magento\Framework\DataObject $row) {
        $ticket = $this->ticketFactory->create()->load($row->getId());

        if($ticket && $ticket->getId()) {
            return $ticket->getStatusAsLabel();
        }

        return '';
    }
}
