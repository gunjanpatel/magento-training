<?php

namespace TrainingUnit3\BlockExercises\Controller\Layout;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\LayoutInterface;
use Magento\Framework\View\Result\PageFactory;

class Show implements HttpGetActionInterface
{
    private PageFactory $factory;
    private LayoutInterface $layout;

    public function __construct(
        PageFactory $pageFactory
    )
    {
        $this->factory = $pageFactory;
    }

    public function execute()
    {
        $result = $this->factory->create();

        return $result;
    }
}
