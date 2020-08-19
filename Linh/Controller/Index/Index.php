<?php


namespace Mini2\Linh\Controller\Index;


use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $resultFactory;
    public function __construct(Context $context,
                                \Magento\Framework\View\Result\PageFactory $resultFactory)
    {
        parent::__construct($context);
        $this->resultFactory = $resultFactory;
    }

    public function execute()
    {
        $page = $this->resultFactory->create();
        return $page;

    }
}
