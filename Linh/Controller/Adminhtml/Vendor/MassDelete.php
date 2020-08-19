<?php


namespace Mini2\Linh\Controller\Adminhtml\Vendor;


use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
use Magento\Backend\App\Action;
use Mini2\Linh\Model\ResourceModel\Vendor\CollectionFactory;


class MassDelete extends \Magento\Backend\App\Action
{
    protected $_filter;
    protected $_collectionFactory;
    protected $resultFactory;

    public function __construct(Action\Context $context, Filter $_filter, CollectionFactory $_collectionFactory)
{
    $this->_collectionFactory = $_collectionFactory;
    $this->_filter = $_filter;
    parent::__construct($context);
}

    public function execute()
{
    $result = $this->_collectionFactory->create();
    $collection = $this->_filter->getCollection($result);
    $collectionSize = $collection->getSize();
    foreach ($collection as $item) {
        $item->delete();
    }
    $this->messageManager->addSuccess(__('A total of %1 element(s) have been deleted.', $collectionSize));
    $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
    return $resultRedirect->setPath('linh/index/index');

}

}


