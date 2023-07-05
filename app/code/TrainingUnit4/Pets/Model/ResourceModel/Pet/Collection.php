<?php

namespace TrainingUnit4\Pets\Model\ResourceModel\Pet;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \TrainingUnit4\Pets\Model\Pet::class,
            \TrainingUnit4\Pets\Model\ResourceModel\Pet::class
        );
    }
}
