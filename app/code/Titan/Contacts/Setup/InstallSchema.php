<?php

namespace Titan\Contacts\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use \Magento\Framework\DB\Ddl\Table;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        
        // create table titan_contacts
        if(!$setup->getConnection()->isTableExists($setup->getTable('titan_contacts'))){
            
            $table = $setup->getConnection()
                ->newTable($setup->getTable('titan_contacts'))
                ->addColumn(
                    'titan_contacts_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                    'Contacts ID'
                )
                ->addColumn(
                    'name',
                    Table::TYPE_TEXT,
                    100,
                    ['nullable' => false, 'default' => 'simple'],
                    'Name'
                )
                ->addColumn(
                    'email',
                    Table::TYPE_TEXT,
                    100,
                    ['nullable' => false, 'default' => 'simple'],
                    'Email'
                )
                ->setComment('Titan Contacts Table')
                ->setOption('type', 'InnoDB')
                ->setOption('charset', 'utf8')
            ;
            
            $setup->getConnection()->createTable($table);
        }
        
        $setup->endSetup();
    }
}
