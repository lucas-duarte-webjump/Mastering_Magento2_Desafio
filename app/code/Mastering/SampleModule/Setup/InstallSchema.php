<?php
namespace Mastering\SampleModule\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        // Criando a tabela e as colunas no magento, utilizando o Setup do Magento
        $installer = $setup;

        $installer->startSetup();

        $table = $installer->getConnection()
            ->newTable($installer->getTable('mastering_sample_item'))
            ->addColumn('id', Table::TYPE_INTEGER, null, ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true], 'Item ID')
            ->addColumn('book_title', Table::TYPE_TEXT, 255, ['nullable' => false], 'Item book')
            ->addColumn('author', Table::TYPE_TEXT, 255, ['nullable' => false], 'Item author')
            ->addColumn('quantity_page', Table::TYPE_INTEGER, null, ['nullable' => false], 'Item quantity')
            ->addColumn('language', Table::TYPE_TEXT, 100, ['nullable' => false], 'Item language')
            ->addColumn('publishing_company', Table::TYPE_TEXT, 255, ['nullable' => false], 'Item publishing')
            ->addindex($installer->getIdxName('mastering_sample_item', ['book_title']), ['book_title'])
            ->setComment('Sample Items');
        $installer->getConnection()->createTable($table);

        $installer->endSetup();

    }
}
