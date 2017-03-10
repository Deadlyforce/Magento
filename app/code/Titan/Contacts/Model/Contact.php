<?php

namespace Titan\Contacts\Model;

use Magento\Cron\Exception;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Stdlib\DateTime;

/**
 * Contact Model
 */
class Contact extends AbstractModel
{
    /**
     * @var DateTime
     */
    protected $_dateTime;

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init( \Titan\Contacts\Model\ResourceModel\Contact::class );
    }
}
