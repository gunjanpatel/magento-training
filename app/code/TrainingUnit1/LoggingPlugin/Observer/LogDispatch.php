<?php

namespace TrainingUnit1\LoggingPlugin\Observer;

class LogDispatch implements \Magento\Framework\Event\ObserverInterface
{
    private $logger;

    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $request = $observer->getRequest();
        $this->logger->info('Observer Logger' . $request);

    }
}

