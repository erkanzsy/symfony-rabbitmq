<?php

namespace App\Command;

use App\Message\SaleReportMessage;
use Doctrine\ORM\EntityManagerInterface;
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
     * @var EntityManagerInterface $em
     */
    private $em;

    /**
     * PushToQueueCommand constructor.
     *
     * @param MessageBusInterface $messageBus
     * @param EntityManagerInterface $em
     */
    public function __construct(MessageBusInterface $messageBus, EntityManagerInterface $em)
    {
        $this->messageBus = $messageBus;
        $this->em = $em;

        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        for ($i = 0; $i<10; ++$i)
        {
            $amount = rand(500, 15000);

            $this->messageBus->dispatch(
                (new SaleReportMessage())
                ->setType($amount % 2 ? 'refund' : 'sale')
                ->setAmount($amount)
                ->setUserName('Erkan')
                ->setAddress('ATASEHIR - ISTANBUL')
            );
        }

        $io->success('Message pushed to queue successfully!');

        return Command::SUCCESS;
    }
}
