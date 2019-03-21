<?php
/**
 * Created by PhpStorm.
 * User: morph
 * Date: 18/01/2019
 * Time: 10:11
 */
namespace Packt\HelloWorld\Model\ResourceModel\Subscription;
/**
 *	Subscription	Collection
 */
class	Collection	extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     *	Initialize	resource	collection
     *
     *	@return	void
     */
    public	function	_construct()	{
        $this->_init('Packt\HelloWorld\Model\Subscription',
                    'Packt\HelloWorld\Model\ResourceModel\Subscription');
    }
}
