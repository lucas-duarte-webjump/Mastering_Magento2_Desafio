<?php
// namespace Mastering\SampleModule\Setup;

// use Magento\Framework\Setup\UpgradeDataInterface;
// use Magento\Framework\Setup\ModuleContextInterface;
// use Magento\Framework\Setup\ModuleDataSetupInterface;

// class UpgradeData implements UpgradeDataInterface
// {

//     public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
//     {
//         $setup->startSetup();

//         if ($context->getVersion() && version_compare($context->getVersion(), '1.0.1') < 0) {

//             $setup->getConnection()->update(
//                 $setup->getTable('mastering_sample_item'),
//                 [
//                     'description' => 'Default Description'
//                 ],
//                 $setup->getConnection()->quoteInto('id = ?', 1)
//             );
//         }
//         $setup->endSetup();
//     }
// }
