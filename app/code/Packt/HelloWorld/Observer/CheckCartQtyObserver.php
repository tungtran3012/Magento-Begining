<?php
namespace Packt\HelloWorld\Observer;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
class CheckCartQtyObserver implements ObserverInterface{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        // TODO: Implement execute() method.
        if	($observer->getProduct()->getQty()	%2	!=	0)	{
            //Odd	qty
            throw	new	\Exception('Qty	 must be even');
        }

    }
}
