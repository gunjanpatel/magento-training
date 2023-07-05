<?php

namespace Gunjan\Account\Controller\Register;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\Result\RawFactory;
use Magento\Framework\Controller\ResultInterface;
use Psr\Log\LoggerInterface;

class Index implements HttpGetActionInterface
{
    private JsonFactory $factory;
    private RawFactory $rawFactory;
    private LoggerInterface $logger;

    public function __construct(JsonFactory $factory, RawFactory $rawFactory, LoggerInterface $logger)
    {
        $this->factory = $factory;
        $this->rawFactory = $rawFactory;
        $this->logger = $logger;
    }

    public function execute()
    {
        $result = $this->factory->create();

        $result->setData(['data' => ['hello' => 'world']]);

        $this->logger->info('Said Hello World');

        return $result;
    }
}
