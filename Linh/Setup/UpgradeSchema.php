<?php


namespace Mini2\Linh\Setup;


use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{

    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.0.3') < 0) {
            $installer = $setup;
            $installer->startSetup();
            $linhTable = $installer->getConnection()->newTable($installer->getTable('maganest_test_vendor_linh'))
                ->addColumn('id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    11, [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'ID')
                ->addColumn('customer_id',
                    \Magento\Framework\Db\Ddl\Table::TYPE_INTEGER,
                    11, [
                        'nullable' => false,
                        'required' => true,
                    ], 'Customer ID')
                ->addColumn('first_name',
                    \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                    255, ['nullable' => false], 'First Name')
                ->addColumn('last_name',
                    \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                    255, ['nullable' => false],
                    'Last Name')
                ->addColumn('email',
                    \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                    255,
                    ['nullable' => false,
                        'required' => true],
                    'Email')
                ->addColumn('company',
                    \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'Company')
                ->addColumn('phone_number',
                    \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                    15,
                    ['nullable' => false],
                    'Phone Number')
                ->addColumn('fax',
                    \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                    20,
                    ['nullable' => false],
                    'Fax')
                ->addColumn('address',
                    \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'Address')
                ->addColumn('street',
                    \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'Street')
                ->addColumn('country',
                    \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'Country')
                ->addColumn('city',
                    \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                    50,
                    ['nullable' => false],
                    'City')
                ->addColumn('postcode',
                    \Magento\Framework\Db\Ddl\Table::TYPE_TEXT,
                    20,
                    ['nullable' => false],
                    'Postcode')
                ->addColumn('total_sales',
                    \Magento\Framework\Db\Ddl\Table::TYPE_FLOAT,
                    11,
                    ['nullable' => false],
                    'Total sales');
            $installer->getConnection()->createTable($linhTable);
            $installer->endSetup();
        }
    }

}
