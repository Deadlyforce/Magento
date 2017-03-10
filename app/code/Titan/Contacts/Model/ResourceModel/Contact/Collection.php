<?php
namespace Titan\Contacts\Model\ResourceModel\Contact;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Description of Collection
 */
class Collection extends AbstractCollection
{
    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('Titan\Contacts\Model\Contact', 'Titan\Contacts\Model\ResourceModel\Contact');
    }
}
