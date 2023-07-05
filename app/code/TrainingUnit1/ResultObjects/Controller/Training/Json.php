<?php

namespace TrainingUnit1\ResultObjects\Controller\Training;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\View\Result\PageFactory;

class Json implements HttpGetActionInterface
{
    private $jsonFactory;

    public function __construct(JsonFactory $jsonFactory)
    {
        $this->jsonFactory = $jsonFactory;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        return $this->jsonFactory->create()->setData(['Hello' => 'Json']);
    }
}
