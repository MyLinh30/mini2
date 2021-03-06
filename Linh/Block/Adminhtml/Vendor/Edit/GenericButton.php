<?php


namespace Mini2\Linh\Block\Adminhtml\Vendor\Edit;
use Magento\Search\Controller\RegistryConstants;
use Magento\Backend\Block\Widget\Context;

class GenericButton
{

    protected $context;

    public function __construct(Context $context
    ) {
        $this->context = $context;
    }

    public function getId()
    {
        return $this->context->getRequest()->getParam('id');
    }
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }


}
