<?php

namespace TrainingUnit1\ResultObjects\Controller\Training;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\RawFactory;

class Raw implements HttpGetActionInterface
{
    private $rawFactory;

    public function __construct(RawFactory $rawFactory)
    {
        $this->rawFactory = $rawFactory;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        return $this->rawFactory->create()->setContents('Hey, this is RAW Content');
    }
}
