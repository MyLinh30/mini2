<?php


namespace Mini2\Linh\Model\Vendor\Customer;


use Magento\Framework\Option\ArrayInterface;
use Magento\Customer\Model\ResourceModel\Customer\CollectionFactory;

class Options implements ArrayInterface
{

    protected $customerCollectionFactory;


    public function __construct(CollectionFactory $customerCollectionFactory)
    {
        $this->customerCollectionFactory = $customerCollectionFactory;
    }

    public function toOptionArray()
    {
        $customerCollection = $this->customerCollectionFactory->create();
        $allCustomer = $customerCollection
            ->addFieldToSelect('*')->getItems();

        foreach ($allCustomer as $customer){
            $options[] =
                [
                'value'=>$customer->getId(),
                'label'=>$customer->getName()
                ];

        }
        return  $options;
    }
}

