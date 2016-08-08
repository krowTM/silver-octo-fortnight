<?php

namespace Tests\VideoImporter\DataPersistence;

use VideoImporter\Model\Video;
use Symfony\Component\Console\Output\OutputInterface;
use VideoImporter\Logger\LoggerOutput;
use VideoImporter\DataPersistence\DataPersistenceMysql;

class DataPersistenceMysqlTest extends \PHPUnit_Framework_TestCase
{
    public function testSave()
    {
        $video = new Video();
        $video->name = 'test video name';

        $output = $this
            ->getMockBuilder(
                OutputInterface::class,
                ['writeln']
            )
            ->getMock();
        $output
            ->expects($this->once())
            ->method('writeln')
            ->with('-- Saving "'.$video->name.'"');

        $logger = new LoggerOutput($output);
        $data_persistence = new DataPersistenceMysql();
        $data_persistence->setLogger($logger);
        $data_persistence->save($video);
    }
}
