<?php

namespace Tbb\Session\Model;

use Magento\Framework\Session\SessionManager;
use Magento\Framework\Session\Storage;

class CustomerSession extends SessionManager
{
    const STORAGE_KEY = 'customer_name';

    protected $_session;



    public function getCustomerName()
    {

        return  $this->getSessionStorage()->getData();
               /* ? (array) $this->getSessionStorage()->getData(self::STORAGE_KEY)
                : 'no session';*/
    }

    public function setCustomerName($customer)
    {

        $this->getSessionStorage()->setData(self::STORAGE_KEY, $customer);
        return $this;
    }

    /**
     * This is ugly AF!
     * But still less coupling than overriding the constructor and having to get the storage from the context.
     * Another issue is that the Session\StorageInterface does not have a getData() method.
     */
    private function getSessionStorage()
    {
        /** @var Storage $storage */
        $storage = $this->storage;
        return $storage;
    }
}
