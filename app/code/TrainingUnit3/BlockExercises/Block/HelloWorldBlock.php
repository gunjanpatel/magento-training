<?php declare(strict_types=1);

namespace TrainingUnit3\BlockExercises\Block;

use Magento\Framework\Data\Form\FormKey;
use Magento\Framework\View\Element\Template;

class HelloWorldBlock extends Template
{
    public function __construct(
        Template\Context $context,

        array $data = []
    )
    {
        parent::__construct($context, $data);

        if (!$this->getTemplate()) {
            $this->setTemplate('TrainingUnit3_BlockExercises::hello-world.phtml');
        }
    }
}
