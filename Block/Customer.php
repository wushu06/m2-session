<?php

namespace Tbb\Session\Block;


class Customer extends \Magento\Framework\View\Element\Template
{

    protected $_storeManager;
    protected $_sessionFactory;
    protected $customerSession;
    protected $customerRepository;
    protected $modelSession;
    protected $_customerFactory;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Tbb\Session\Model\CustomerSession $customerSessionRepository,
        \Magento\Customer\Model\SessionFactory $sessionFactory,
        \Magento\Customer\Model\Session $modelSession,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    )
    {
        parent::__construct($context);
        $this->_customerFactory = $customerFactory;
        $this->customerSession = $customerSessionRepository;
        $this->_storeManager = $storeManager;
        $this->_sessionFactory   = $sessionFactory;
        $this->modelSession   = $modelSession;
        $this->customerRepository = $customerRepository;

    }

    public function getName()
    {
        return $this->customerSession->getCustomerName();
        $customer = $this->_sessionFactory->create();

        if ( $customer->getCustomer()->getId()) {
            $customer =  $this->customerSession->setCustomerName($customer->getCustomer()->getName())->getCustomerName();

        }else{
            $customer = 'not logged in';
        }
        return $customer;

    }

    public function getCustomerName(){
        $customer = $this->_sessionFactory->create();
        return $customer->getCustomer()->getName();
    }

    public function getCustomerNameFromModel(){
        return 'id: '.$this->modelSession->getCustomerId().' name: '.$this->modelSession->getCustomer()->getName();
    }


    public function getCustomerData()
    {
        $customer = $this->_sessionFactory->create();
        return $customer->getCustomer();
    }

    public function getCustomerNameById($id = null)
    {
        $id= $id?: $this->modelSession->getCustomerId();
        return $this->_customerFactory->create()->load($id)->getFirstname();
    }





}