<?php
namespace Titan\Contacts\Model\Contact;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Titan\Contacts\Model\ResourceModel\Contact\CollectionFactory;

class DataProvider extends AbstractDataProvider
{
    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $contactCollection
     * @param array $meta
     * @param array $data
     */
    public function __construct( $name, $primaryFieldName, $requestFieldName, CollectionFactory $contactCollection, array $meta = [], array $data = []) 
    {
        $this->collection = $contactCollection->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        $this->loadedData = array();
        /** @var Customer $customer */
        foreach ($items as $contact) {
            // notre fieldset s'apelle "contact" d'ou ce tableau pour que magento puisse retrouver ses datas :
            $this->loadedData[$contact->getId()]['contact'] = $contact->getData();
        }


        return $this->loadedData;

    }
}
