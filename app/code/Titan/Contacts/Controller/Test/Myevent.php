<?php

namespace Titan\Contacts\Controller\Test;

use Magento\Framework\App\Action\Action;

/**
 * Description of MyEvent
 *
 */
class Myevent extends Action
{
    public function execute()
    {
        $this->_eventManager->dispatch('titan_contacts_event_test');
//        die('test');
    }
}
