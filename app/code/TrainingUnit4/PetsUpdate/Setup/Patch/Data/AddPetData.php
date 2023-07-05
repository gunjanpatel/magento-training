<?php

namespace TrainingUnit4\PetsUpdate\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddPetData implements DataPatchInterface
{
    private ModuleDataSetupInterface $moduleDataSetup;

    public function __construct(ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * @inheritDoc
     */
    public static function getDependencies(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getAliases(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function apply()
    {
        $data = [
            ['pet_name' => 'Bobby', 'pet_type' => 'Dob', 'customer_id' => 1],
            ['pet_name' => 'Clara', 'pet_type' => 'Cat', 'customer_id' => 1],
        ];

        $tableName = $this->moduleDataSetup->getTable('pet');
        $conn = $this->moduleDataSetup->getConnection();

        $conn->startSetup(); // Will turn off foreign key checks
        $conn->insertMultiple($tableName, $data);
        $conn->endSetup(); // Will turn on foreign key checks

        return $this;
    }
}
