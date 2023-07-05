<?php

namespace TrainingUnit1\ResultObjects\Controller\Training;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\ForwardFactory;

class Forward implements HttpGetActionInterface
{
    private $forwardFactory;

    public function __construct(ForwardFactory $forwardFactory)
    {
        $this->forwardFactory = $forwardFactory;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        return $this->forwardFactory->create()->forward('json');
    }
}
