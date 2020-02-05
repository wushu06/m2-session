<?php declare(strict_types = 1);

namespace Tbb\Session\CustomerData;

use Magento\Customer\CustomerData\SectionSourceInterface;
use Tbb\Session\Api\CustomerSessionRepositoryInterface;

class  CustomerSource implements SectionSourceInterface
{
    /**
     * @var customerSessionInterface
     */
    private $customerSession;

    public function __construct(CustomerSessionRepositoryInterface $customerSession)
    {
        $this->customerSession = $customerSession;
    }

    public function getSectionData()
    {
        return ['customerName' => $this->customerSession->getName()];
    }
}
