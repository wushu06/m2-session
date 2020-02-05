<?php declare(strict_types = 1);

namespace Tbb\Session\Api;

interface CustomerSessionRepositoryInterface
{
    /**
     * @return string[]
     */
    public function getCustomerName();

}
