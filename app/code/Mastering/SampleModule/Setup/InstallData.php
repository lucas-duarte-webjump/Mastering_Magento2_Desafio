<?php
namespace Mastering\SampleModule\Setup;


use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        // Inserindo dados nas tabelas criadas no arquivo de Schemas

        $setup->startSetup();

        $setup->getConnection()->insert(
            $setup->getTable('mastering_sample_item'),
            [
                'book_title' => 'Homo Deus',
                'author' => 'Yuval Noah Harari',
                'quantity_page' => 300,
                'language' => 'pt-BR',
                'publishing_company' => 'Companhia das Letras',
            ]
        );
        $setup->getConnection()->insert(
            $setup->getTable('mastering_sample_item'),
            [
                'book_title' => 'Homo Sapies',
                'author' => 'Yuval Noah Harari',
                'quantity_page' => 235,
                'language' => 'pt-BR',
                'publishing_company' => 'Companhia das Letras',
            ]
        );
        $setup->getConnection()->insert(
            $setup->getTable('mastering_sample_item'),
            [
                'book_title' => 'A origem das espécies',
                'author' => 'Charles Darwing',
                'quantity_page' => 570,
                'language' => 'pt-BR',
                'publishing_company' => 'Martin & Claret',
            ]
        );
        $setup->getConnection()->insert(
            $setup->getTable('mastering_sample_item'),
            [
                'book_title' => 'Freud Totem e tabu',
                'author' => 'Freud',
                'quantity_page' => 150,
                'language' => 'pt-BR',
                'publishing_company' => 'L & PM Pocket',
            ]
        );
        $setup->getConnection()->insert(
            $setup->getTable('mastering_sample_item'),
            [
                'book_title' => 'Mitologia Nórdica',
                'author' => 'Neil Gaiman',
                'quantity_page' => 286,
                'language' => 'pt-BR',
                'publishing_company' => 'Intrinesca',
            ]
        );

        $setup->endSetup();
    }
}
