<?php
/**
 * Created by PhpStorm.
 * User: morph
 * Date: 17/01/2019
 * Time: 16:59
 */
namespace  Packt\SEO\Setup;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface {
    protected $resourceConfigl;
    public function __construct(\Magento\Config\Model\ResourceModel\Config $resourceConfigl)
    {
        $this->resourceConfigl=$resourceConfigl;
    }
    public function install(ModuleDataSetupInterface $setup,ModuleContextInterface $context){
        $setup->startSetup();
        $this -> resourceConfigl->saveConfig(
            'catalog/seo/category_cononical_tag',
            true,
            \Magento\Config\Block\System\Config\Form::SCOPE_DEFAULT,
            0
        );
        $this->resourceConfigl->saveConfig(
            'catalog/seo/product_canonical_tag',
            true,
            \Magento\Config\Block\System\Config\Form::SCOPE_DEFAULT,
            0
        );
        $setup->endSetup();
    }

}