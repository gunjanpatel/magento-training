<?php

namespace TrainingUnit4\Pets\Model;

use Magento\Framework\Model\AbstractModel;
use TrainingUnit4\Pets\Model\ResourceModel\Pet as PetResource;

class Pet extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(PetResource::class);
        // Choosing a different collection
        //$this->_collectionName = PetResourceModel\PetCollection::class
    }
}
