<?php declare(strict_types=1);

namespace TrainingUnit3\BlockExercises\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class ArrayProviderViewModel implements ArgumentInterface
{
    public function getArrayData(): array
    {
        return ['One', 'Two', 'Three'];
    }
}
