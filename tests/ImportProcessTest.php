<?php

namespace Tests\VideoImporter;

use VideoImporter\ImportProcess;
use Symfony\Component\Console\Output\OutputInterface;
use VideoImporter\Logger\LoggerOutput;
use VideoImporter\DataPersistence\DataPersistenceMysql;
use VideoImporter\DataParser\DataParserJson;

class ImportProcessTest extends \PHPUnit_Framework_TestCase
{
    public function testRunInvalidVideo()
    {
        $output = $this
            ->getMockBuilder(
                OutputInterface::class,
                ['writeln']
            )
            ->getMock();
        $output
        	->expects($this->exactly(2))
            ->method('writeln')
            ->withConsecutive(
            	$this->equalTo('-- Importing "" ; Url: http://glorf.com/videos/3; Tags: '),
            	$this->equalTo('-- --Invalid--Skipping--')
            );

        $logger = new LoggerOutput($output);
        $persistence = new DataPersistenceMysql();
        $persistence->setLogger($logger);

        $data = '
{
    "videos": [
        {
            "url": "http://glorf.com/videos/3"
        }
	]
}
		';

        $json_parser = new DataParserJson();
        $json_parser->setData($data);

        $import_process = new ImportProcess(
                $json_parser,
                $logger,
                $persistence
        );
        $import_process->run();
    }
}
