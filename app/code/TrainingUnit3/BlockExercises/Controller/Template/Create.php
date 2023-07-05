<?php

namespace TrainingUnit3\BlockExercises\Controller\Template;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\CsrfAwareActionInterface;
use Magento\Framework\App\Request\InvalidRequestException;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;

class Create implements HttpPostActionInterface
{
    private RequestInterface $request;
    private JsonFactory $factory;

    public function __construct(
        RequestInterface $request,
        JsonFactory $factory
    )
    {
        $this->request = $request;
        $this->factory = $factory;
    }

    public function execute()
    {
        $result = $this->factory->create();
        $result->setHeader('content-type', 'application/json', true);
        $result->setData(
            $this->request->getParams()
        );

        return $result;
    }

    /*public function createCsrfValidationException(RequestInterface $request): ?InvalidRequestException
    {
        // TODO: Implement createCsrfValidationException() method.
        return null;
    }

    public function validateForCsrf(RequestInterface $request): ?bool
    {
        // TODO: Implement validateForCsrf() method.
        return true;
    }*/
}
