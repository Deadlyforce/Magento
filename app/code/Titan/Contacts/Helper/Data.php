<?php

namespace Titan\Contacts\Helper;


/**
 * Description of Data
 *
 * @author Norman
 */
class Data extends \Magento\Catalog\Helper\Data
{
    public function getProduct()
    {
        die('rewrite helper');
        return $this->_coreRegistry->registry('current_product');
    }
}
