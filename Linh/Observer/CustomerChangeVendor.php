<?php


namespace Mini2\Linh\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Customer\Model\CustomerFactory;
use Psr\Log\LoggerInterface;
use Magento\Customer\Api\CustomerRepositoryInterface;

class CustomerChangeVendor implements ObserverInterface
{
    protected $_customerFactory;

    public function __construct(CustomerFactory $customerFactory)
    {
        $this->_customerFactory = $customerFactory;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customer = $observer->getData('customer');
        $id = $customer->getId();
        try{
            $customerRow = $this->_customerFactory->create()->load($id);
            $customerRow->setData('mylinh_is_approved', 0);
            $customerRow->save();
        }catch (\Exception $exception){
            throwException($exception);
        }
    }
}
