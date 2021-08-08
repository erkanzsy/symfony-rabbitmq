<?php

namespace App\MessageHandler;

use App\Message\SaleReportMessage;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SaleReportMessageHandler implements MessageHandlerInterface
{
    /**
     * @var LoggerInterface $logger
     */
    private $logger;

    public function __invoke(SaleReportMessage $reportMessage)
    {

    }
}