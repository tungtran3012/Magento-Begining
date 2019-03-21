<?php
/**
 * Created by PhpStorm.
 * User: morph
 * Date: 17/01/2019
 * Time: 13:26
 */
namespace	Packt\HelloWorld\Block;
use	Magento\Framework\View\Element\Template;
class	Newproducts	extends	Template
{
    private  $_productCollectionFactory;
    public function __construct(Template\Context $context, \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,array $data=[])
    {
        parent::__construct($context, $data);
        $this->_productCollectionFactory=$productCollectionFactory;
    }

    public function getProducts(){
        $collections=$this->_productCollectionFactory->create();
        $collections->addAttributeToSelect('*')->setOrder('create_at')->setPageSize(5);
        return $collections;
    }
}