<?php

namespace Tbb\Session\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * Booking action
     *
     * @return void
     */
    protected $_pageFactory;
    protected $resultPageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory

    ) {
        parent::__construct($context);
        $this->resultPageFactory            = $resultPageFactory;

    }

    public function execute()
    {



        $this->_view->loadLayout();
        $this->_view->renderLayout();

    }
}