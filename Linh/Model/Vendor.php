<?php


namespace Mini2\Linh\Model;


class Vendor extends \Magento\Framework\Model\AbstractModel
{
    public function __construct(\Magento\Framework\Model\Context $context,
                                \Magento\Framework\Registry $registry,
                                \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
                                \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
                                array $data = [])
    {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }
    protected function _construct()
    {
        $this->_init('Mini2\Linh\Model\ResourceModel\Vendor');
        parent::_construct(); // TODO: Change the autogenerated stub
    }

}
