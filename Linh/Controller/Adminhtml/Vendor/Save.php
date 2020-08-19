<?php


namespace Mini2\Linh\Controller\Adminhtml\Vendor;


use Magento\Framework\App\Action\Context;

class Save extends \Magento\Framework\App\Action\Action
{

    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    public function execute()
    {
        $data = (array)$this->getRequest()->getPost();
        $data['total_sales'] = 0;
        $vendor = $this->_objectManager->create('Mini2\Linh\Model\Vendor');
        $vendor->setData($data);
        $vendor->save();
        $this->messageManager->addSuccess(__('Save vendor success!'));
        $this->_redirect('linh/index/index');
    }
}


