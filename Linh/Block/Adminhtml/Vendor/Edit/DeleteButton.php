<?php


namespace Mini2\Linh\Block\Adminhtml\Vendor\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Mini2\Linh\Block\Adminhtml\Vendor\Edit\GenericButton;

class DeleteButton extends GenericButton implements ButtonProviderInterface
{

    public function getButtonData()
{
    $data = [];
    if ($this->getId()) {
        $data = [
            'label' => __('Delete Vendor'),
            'class' => 'delete',
            'on_click' => 'deleteConfirm(\''
                . __('Are you sure you want to delete this manufacturer ?')
                . '\', \'' . $this->getDeleteUrl() . '\')',
            'sort_order' => 20,
        ];
    }
    return $data;
}

    /**
     * @return string
     */
    public function getDeleteUrl()
{
    return $this->getUrl('linh/vendor/delete', ['id' => $this->getId()]);
}
}

