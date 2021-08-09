<?php
namespace Mastering\SampleModule\Setup;


use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        // Inserindo dados nas tabelas criadas no arquivo de Schemas

        $setup->startSetup();

        $setup->getConnection()->insert(
            $setup->getTable('mastering_sample_item'),
            [
                'name' => 'Item 1'
            ]
        );
        $setup->getConnection()->insert(
            $setup->getTable('mastering_sample_item'),
            [
                'name' => 'Item 2'
            ]
        );

        $setup->endSetup();
    }
}
