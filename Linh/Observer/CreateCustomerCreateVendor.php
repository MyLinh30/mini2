<?php


namespace Mini2\Linh\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class CreateCustomerCreateVendor implements ObserverInterface
{


    public function execute(Observer $observer)
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
        // TODO: Implement execute() method.
    }
}
