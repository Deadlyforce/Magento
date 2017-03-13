<?php
namespace Titan\Contacts\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use \Magento\Framework\DB\Ddl\Table;
use Magento\Catalog\Model\ResourceModel\Product\Gallery;
use Magento\Catalog\Model\Product\Attribute\Backend\Media\ImageEntryConverter;
use Magento\Framework\DB\Adapter\AdapterInterface;

/**
 * Upgrade the Catalog module DB scheme
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * {@inheritdoc}
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if(version_compare($context->getVersion(), '0.2.0', '<')){

            $tableName = $setup->getTable('titan_contacts');
            $setup->getConnection()->addColumn($tableName, 'comment', [
                'type' => Table::TYPE_TEXT,
                'length'    => 255,
                'unsigned' => true,
                'nullable' => false,
                'default' => '0',
                'comment' => 'Comment'
            ]);
        }else if(version_compare($context->getVersion(), '0.3.0', '<')){
            
            /**
             * Add full text index to our table department
             */
            $tableName = $setup->getTable('titan_contacts');
            $fullTextIndex = array('name','email'); // Column with fulltext index, you can put multiple fields
            
            $setup->getConnection()->addIndex(
                $tableName,
                $setup->getIdxName($tableName, $fullTextIndex, AdapterInterface::INDEX_TYPE_FULLTEXT),
                $fullTextIndex,
                AdapterInterface::INDEX_TYPE_FULLTEXT
            );
        }
        $setup->endSetup();
    }
}
