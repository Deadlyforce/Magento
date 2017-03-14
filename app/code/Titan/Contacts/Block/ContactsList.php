<?php

namespace Titan\Contacts\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Titan\Contacts\Model\Contact;
use Magento\Framework\App\ResourceConnection;

class ContactsList extends Template
{
    private $contact;
    
    public function __construct( Context $context, Contact $contact, ResourceConnection $resource, array $data = [] ) 
    {
        $this->contact = $contact;
        $this->resource = $resource;
        
        parent::__construct( $context, $data );
    }

    public function getContacts()
    {
        $contacts = $this->contact->getCollection();
       
        return $contacts;       
    }
}

