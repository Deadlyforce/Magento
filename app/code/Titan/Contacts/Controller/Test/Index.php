<?php

namespace Titan\Contacts\Controller\Test;

use Magento\Framework\App\Action\Action;


class Index extends Action
{
    public function execute() 
    {
//        $this->_view->loadLayout();
//        $this->_view->renderLayout();
        
        $contactModel = $this->_objectManager->create('Titan\Contacts\Model\Contact');
        $contacts = $contactModel->getCollection()->addFieldToFilter('name', array('like' => 'James Bond'));
        
        foreach($contacts as $contact){
            var_dump($contact->getData());
        }
        
        die('test');
    }
}

