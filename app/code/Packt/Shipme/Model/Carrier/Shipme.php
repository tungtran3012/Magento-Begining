<?php
namespace Packt\Shipme\Model\Carrier;
use Magento\Shipping\Model\Rate\Result;
class Shipme extends \Magento\Shipping\Model\Carrier\AbstractCarrier implements \Magento\Shipping\Model\Carrier\CarrierInterface
{
    protected $_code = 'shipme';
    /**
     * @var \Magento\Shipping\Model\Rate\ResultFactory
     */
    protected $_rateResultFactory;
    /**
     * @var \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory
     */
    protected $_rateMethodFactory;

    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Shipping\Model\Rate\ResultFactory $_rateResultFactory,
        \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $_rateMethodFactory,
        array $data = [])
    {
        $this->_rateMethodFactory = $_rateMethodFactory;
        $this->_rateResultFactory = $_rateResultFactory;
        parent::__construct($scopeConfig, $rateErrorFactory, $logger, $data);
    }

    public function collectRates(\Magento\Quote\Model\Quote\Address\RateRequest $request)
    {
        // TODO: Implement collectRates() method.
        if (!$this->getConfigFlag('active')) {
            //carriers/shipme/active
            return false;
        }
        $result = $this->_rateResultFactory->create();

        //Check if express method is enabled
        if ($this->getConfigData('express_enabled')) {
            $method = $this->_rateMethodFactory->create();

            $method->setCarrier($this->_code);
            $method->setCarrierTitle($this->getConfigData('name'));

            $method->setMethod('business');
            $method->setMethodTitle($this->getConfigData('business_title'));

            $method->setPrice($this->getConfigData('business_price'));
            $method->setCost($this->getConfigData('business_price'));

            $result->append($method);
        }
        return $result;
    }

    public function getAllowedMethods()
    {
        // TODO: Implement getAllowedMethods() method.
        return ['shipme' => $this->getConfigData('name')];
    }

    public function isTrackingAvailable()
    {
        return true;
    }
}