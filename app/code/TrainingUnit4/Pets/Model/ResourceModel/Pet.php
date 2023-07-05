<?php

namespace TrainingUnit4\Pets\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Pet extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('pet', 'pet_id');
    }
}
