<?php

namespace Titan\Contacts\Model;

use Magento\Cron\Exception;
use Magento\Framework\Model\AbstractModel;
use Magento\Catalog\Model\Product;

/**
 * Surcharge de la classe native product
 */
class Product extends Product
{
    /**
     * Get Product name
     * 
     * @return string
     * @codeCoverageIgnoreStart
     */
    public function getName()
    {
        return parent::getName() . ' bastard!';
    }
}
