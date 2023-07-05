<?php

namespace TrainingUnit1\ResultObjects\Controller\Training;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\RedirectFactory;

class Redirect implements HttpGetActionInterface
{
    private $redirectFactory;

    public function __construct(RedirectFactory $redirectFactory)
    {
        $this->redirectFactory = $redirectFactory;
    }

    /**
     * @inheritDoc
     */
    public function execute()
    {
        return $this->redirectFactory->create()->setPath('/');
    }
}
