<?php

namespace Titan\Contacts\Controller\Adminhtml\Test;

use Magento\Backend\App\Action;
use Titan\Contact\Model\Contact as Contact;

class Edit extends Action
{
    /**
     * Page "Edit A Contact"
     *
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Backend\Model\View\Result\Redirect
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
        
//        die('youpi');

        $contactDatas = $this->getRequest()->getParam('contact');
        
        if(is_array($contactDatas)) {
            $contact = $this->_objectManager->create(Contact::class);
            $contact->setData($contactDatas)->save();
            $resultRedirect = $this->resultRedirectFactory->create();
            
            return $resultRedirect->setPath('*/*/index');
        }
    }
}
