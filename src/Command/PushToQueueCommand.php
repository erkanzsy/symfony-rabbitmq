<?php

namespace App\Command;

use App\Message\SaleReportMessage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;

class PushToQueueCommand extends Command
{
    protected static $defaultName = 'app:push:to:queue';

    /**
     * @var MessageBusInterface $messageBus
     */
    private $messageBus;

    /**
     * PushToQueueCommand constructor.
     * @param MessageBusInterface $messageBus
     */
    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;

        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        for ($i = 0; $i<100; ++$i)
        {
            $this->messageBus->dispatch(
                (new SaleReportMessage())
                ->setType('refund')
                ->setAmount(6000.4)
                ->setUserName('Erkan')
                ->setAddress('ATASEHIR - ISTANBUL')
            );
        }

        $io->success('Message pushed to queue successfully!');

        return Command::SUCCESS;
    }
}
