<?php
    namespace Packt\HelloWorld\Controller\Adminhtml\Component;

    use Magento\Backend\App\Action;
    use Magento\Backend\App\Action\Context;
    use Magento\Framework\View\Result\PageFactory;

    class Index extends \Magento\Backend\App\Action
    {
        protected $resultFactory;
        public function __construct(Context $context,PageFactory $resultPageFactory)
        {

            parent::__construct($context);
            $this->resultPageFactory=$resultPageFactory;
        }
        public function execute()
        {
            // TODO: Implement execute() method.
            $resultPage=$this->resultPageFactory->create();

            $resultPage->setActiveMenu('Packt_HelloWorld::component');
            $resultPage->addBreadcrumb(__('HelloWorld'),__('HelloWorld'));
            $resultPage->addBreadcrumb(__('Components'),__('Components'));
            $resultPage->getConfig()->getTitle()->prepend(__('Components'));

            return $resultPage;
        }
        protected function _isAllowed()
        {
            return $this->_authorization->isAllowed('Packt_HelloWorld::helloworld');
        }
    }
?>