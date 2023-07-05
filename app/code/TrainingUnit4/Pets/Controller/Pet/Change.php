<?php

namespace TrainingUnit4\Pets\Controller\Pet;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use TrainingUnit4\Pets\Model\PetFactory;
use TrainingUnit4\Pets\Model\ResourceModel\Pet as PetResource;

class Change implements HttpGetActionInterface
{
    private JsonFactory $factory;
    private PetFactory $petFactory;
    private RequestInterface $request;
    private PetResource $petResource;

    public function __construct(
        JsonFactory      $factory,
        RequestInterface $request,
        PetFactory $collectionFactory,
        PetResource      $petResource
    )
    {
        $this->factory = $factory;
        $this->petFactory = $collectionFactory;
        $this->request = $request;
        $this->petResource = $petResource;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $result = $this->factory->create();
        $result->setHeader('Content-Type', 'application/json', true);

        $id = $this->request->getParam('id');
        $newName = $this->request->getParam('name');

        if (!$id || !$newName) {
            return $result->setData(['error' => 'ID or Name or both missing']);
        }

        // Gives Model
        $petModel = $this->petFactory->create();

        $this->petResource->load($petModel, $id);

        if (!$petModel->getId()) {
            return $result->setData(['error' => sprintf("No pet found with ID '%d'", $id)]);
        }

        $petModel->setPetName($newName);
        // $petModel->setData('pet_name', $newName);
        // $petModel->setDataUsingMethod('pet_name', $newName);

        $this->petResource->save($petModel);

        $result->setData(
            ['success' => sprintf("Name has been change to '%s' for Id '%d'", $newName, $id)]
        );

        return $result;
    }
}
