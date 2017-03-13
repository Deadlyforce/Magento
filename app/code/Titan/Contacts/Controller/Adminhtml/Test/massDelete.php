<?php

namespace Titan\Contacts\Controller\Adminhtml\Test;

use Magento\Backend\App\Action;
use Titan\Contacts\Model\Contact;

class MassDelete extends Action
{
    public function execute() 
    {
        $ids = $this->getRequest()->getParam('selected', []);
        
        if (!is_array($ids) || !count($ids)) {
            $resultRedirect = $this->resultRedirectFactory->create();
            return $resultRedirect->setPath('*/*/index', array('_current' => true));
        }
        
        foreach ($ids as $id) {
            $contact = $this->_objectManager->create(Contact::class)->load($id);
            
            if ($contact) {
                $contact->delete();
            }
        }
        
        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', count($ids)));
        $resultRedirect = $this->resultRedirectFactory->create();
        
        return $resultRedirect->setPath('*/*/index', array('_current' => true));
    }
}
