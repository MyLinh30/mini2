<?php


namespace Mini2\Linh\Controller\Index;


use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Customer\Model\ResourceModel\Customer\CollectionFactory;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\PageFactory;

class GetCustomerAjax extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    protected $_collectionFactory;
    protected $resultJsonFactory;
    public function __construct(Context $context,
                                PageFactory $resultPageFactory,
                                CollectionFactory $_collectionFactory,
                                JsonFactory $resultJsonFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->_collectionFactory = $_collectionFactory;
        $this->resultJsonFactory = $resultJsonFactory;
    }
    public function execute()
    {

        $id = $this->getRequest()->getPost('id_customer');
        $customers = $this->_collectionFactory->create();
        $resultJson = $this->resultJsonFactory->create();
        $customerCollection = $customers->getItems();
        foreach ($customerCollection as $customer)
            if($customer->getId()== $id){
              $data= array($customer->getId(), $customer->getEmail(), $customer->getFirstname(), $customer->getLastname()) ;
        }
        return  $resultJson->setData($data);;

    }
}

