<?php

namespace TrainingUnit4\Pets\Controller\Pet;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use TrainingUnit4\Pets\Model\Pet;
use TrainingUnit4\Pets\Model\ResourceModel\Pet\CollectionFactory;

class Filter implements HttpGetActionInterface
{
    private JsonFactory $factory;
    private CollectionFactory $collectionFactory;
    private RequestInterface $request;

    public function __construct(
        JsonFactory $factory,
        CollectionFactory $collectionFactory,
        RequestInterface $request
    )
    {
        $this->factory = $factory;
        $this->collectionFactory = $collectionFactory;
        $this->request = $request;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $result = $this->factory->create();
        $data = [];

        $type = $this->request->getParam('type');

        /** @var Pet[] $collection */
        $collection = $this->collectionFactory->create();

        if ($type) {
            $collection->addFieldToFilter('pet_type', ['eq' => $type]);
        }

        foreach ($collection as $pet) {
            $data[] = $pet->getData();
        }

        /*
         $petModelFactory = $di->get(\TrainingUnit4\Pets\Model\PetFactory::class);
         $petResource = $di->get(\TrainingUnit4\Pets\Model\ResourceModel\Pet::class);
         $petResource->load($petModelFromFactory, 1);
         $petModelFromFactory->getData();
         */

        $result->setData($data);
        $result->setHeader('Content-Type', 'application/json', true);

        return $result;
    }
}
