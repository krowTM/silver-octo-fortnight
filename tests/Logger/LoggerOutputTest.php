<?php

namespace Tests\VideoImporter\Logger;

use VideoImporter\Logger\LoggerOutput;
use Symfony\Component\Console\Output\OutputInterface;

class LoggerOutputTest extends \PHPUnit_Framework_TestCase
{
    public function testOutput()
    {
        $msg = 'test msg';

        $output = $this
            ->getMockBuilder(
                OutputInterface::class,
                ['writeln']
            )
            ->getMock();
        $output
            ->expects($this->once())
            ->method('writeln')
            ->with($msg);

        $logger = new LoggerOutput($output);
        $logger->log($msg);
    }
}
