<?php

namespace Titan\Contacts\Block\Product;

use Magento\Catalog\Block\Product\View;
use Magento\Catalog\Model\Product;

/**
 * Retrieve current product model
 * 
 * @return Product
 */
class View extends View
{
    public function getProduct()
    {
        die('test rewrite block product view');
    }
}
