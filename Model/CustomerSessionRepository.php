<?php declare(strict_types = 1);

namespace Tbb\Session\Model;

use Tbb\Session\Api\CustomerSessionRepositoryInterface;

class CustomerSessionRepository implements CustomerSessionRepositoryInterface
{
    /**
     * @var CustomerSession
     */
    private $session;

    public function __construct(CustomerSession $session)
    {
        $this->session = $session;
    }

    public function getCustomerName()
    {
        return $this->session->getCustomerName();
    }

}
