<?php


namespace Mini2\Linh\Controller\Adminhtml\Vendor;


class Delete extends \Magento\Backend\App\Action
{
    /**
     * Authorization level
     *
     * @see _isAllowed()
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Rsgitech_News::news_delete');
    }

    /**
     * Delete action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        if($id){
            try {
                $model = $this->_objectManager->create('Mini2\Linh\Model\Vendor');
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('Delete vendor finish!'));
                $this->_redirect('linh/index/index');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }

        }


    }
}


