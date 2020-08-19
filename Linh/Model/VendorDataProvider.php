<?php


namespace Mini2\Linh\Model;


class VendorDataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $_loadedData;

    public function __construct($name,
                                $primaryFieldName,
                                $requestFieldName,
                                \Mini2\Linh\Model\ResourceModel\Vendor\CollectionFactory $vendorCollectionFactory,
                                array $meta = [],
                                array $data = [])
    {
        $this->collection = $vendorCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
    public function getData()
    {
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $vendor) {
            $this->_loadedData[$vendor->getId()] = $vendor->getData();
        }
        return $this->_loadedData;
    }

}


