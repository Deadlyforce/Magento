<?php
namespace Titan\Contacts\Controller\Adminhtml\Test;

use Magento\Backend\App\Action;

/**
 * Description of Index
 */
class Index extends Action
{
    /**
     * Index action
     * 
     * @return void
     */
    public function execute() 
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
