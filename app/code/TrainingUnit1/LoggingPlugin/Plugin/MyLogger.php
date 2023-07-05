<?php

namespace TrainingUnit1\LoggingPlugin\Plugin;

class MyLogger
{
    private $logger;


    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function afterDispatch(
        \Magento\Framework\App\Action\Action    $subject,
                                                $result,
        \Magento\Framework\App\RequestInterface $request
    )
    {
        $this->logger->info('Request Full action name logged by plugin ' . $request);

        return $result;
    }
}

