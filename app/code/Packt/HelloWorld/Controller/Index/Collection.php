<?php
namespace	Packt\HelloWorld\Controller\Index;
class	Collection	extends	\Magento\Framework\App\Action\Action	{
    public	function	execute()	{
        $productCollection	=	$this->_objectManager
            ->create('Magento\Catalog\Model\ResourceModel\Product\Collection')
            ->addAttributeToSelect([
                'name',
                'price',
                'image',
            ])
            ->addAttributeToFilter('name',	array('like'	=>	'%i%'));
        echo $productCollection->getSelect().'<br><br>';


        $output	=	$productCollection->getSelect()->__toString();
        $productCollection->setDataToAll('price',	20);
        foreach	($productCollection	as	$product)	{
            $output	.=	\Zend_Debug::dump($product->debug(),	null,	false);
        }
        $this->getResponse()->setBody($output);
    }
}