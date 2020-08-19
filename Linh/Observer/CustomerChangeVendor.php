<?php


namespace Mini2\Linh\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;
use Magento\Customer\Api\CustomerRepositoryInterface;

class CustomerChangeVendor implements ObserverInterface
{
    private $logger;
    protected $_customerRepositoryInterface;
    protected $customer;
    public function __construct(\Psr\Log\LoggerInterface $logger,
                                \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface)
    {
        $this->logger = $logger;
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
    }

    public function execute(Observer $observer)
    {
        $this->logger->debug('First Name is Changed!');
        $customer = $observer->getCustomerDataObject();
        $customerId = $customer->getId();
        if (strcmp($customer->getFirstName(), 'Magenest') != 0) {
            $customerData = $this->_customerRepositoryInterface->getById($customerId);
            $customerData->setFirstName('Magenest');
            $this->_customerRepositoryInterface->save($customerData);
        }

    }
}
