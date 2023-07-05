<?php

namespace TrainingUnit4\Attribute\Setup\Patch\Data;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Model\Entity\Attribute\Source\Boolean;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;

class CreateIsRecyclableAttribute implements DataPatchInterface
{
    private ModuleDataSetupInterface $moduleDataSetup;
    private EavSetupFactory $eavSetupFactory;
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory
    )
    {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavSetup = $eavSetupFactory->create(['setup' => $moduleDataSetup]);
    }

    public function apply(): PatchInterface
    {
        $attributeCode = 'is_recyclable';
        $attributeProperties = [
            'label' => 'Is recyclable?',
            'input' => 'select',
            'source' => Boolean::class,
            'type' => 'int',
            'require' => false,
            'user_defined' => true,
            'unique' => false,
            'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
            'position' => '50',
            'group' => 'General',
        ];

        $this->eavSetup->addAttribute(
            Product::ENTITY,
            $attributeCode,
            $attributeProperties
        );

        return $this;
    }

    public static function getDependencies(): array
    {
        return [];
    }

    public function getAliases(): array
    {
        return [];
    }
}
