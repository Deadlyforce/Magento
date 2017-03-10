<?php

namespace Titan\Contacts\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class ContactsList extends Template
{
    public function __construct( Context $context, array $data = array() ) 
    {
        parent::__construct( $context, $data );
        $this->setData('contacts', array());
    }

    public function addContacts( $count )
    {
        $contacts = $this->getData('contacts');
        
        $actualNumber = count($contacts);
        $names = array();
        
        for($i = $actualNumber; $i < ($actualNumber + $count) ; $i++){
            $contacts[] = 'nom ' . ($i+1);
        }
        $this->setData('contacts', $contacts);
    }
}

