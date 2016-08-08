<?php

namespace VideoImporter\Logger;

use Symfony\Component\Console\Output\OutputInterface;

class LoggerOutput implements LoggerInterface
{
    private $logger;

    public function __construct(OutputInterface $output)
    {
        $this->logger = $output;
    }

    public function log($msg)
    {
        $this->logger->writeln($msg);
    }
}
