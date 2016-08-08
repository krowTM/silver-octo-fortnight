<?php

namespace Tests\VideoImporter;

use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\Console\Application;
use VideoImporter\Command\ImportVideosCommand;

class ImportVideosCommandTest  extends \PHPUnit_Framework_TestCase
{
	public function testExecute()
	{
		$application = new Application();
		$application->add(new ImportVideosCommand());
		$command = $application->find('import');
		
		$command_tester = new CommandTester($command);
		$command_tester->execute([
			'command' => $command->getName(),
			'source_name' => 'flub'
		]);
		
		$output = $command_tester->getDisplay();
		
		$this->assertContains(
			'Importing videos from: flub',
			$output
		);
		$this->assertContains(
			'-- Importing "funny cats" ; Url: http://glorf.com/videos/asfds.com; Tags: cats,cute,funny',
			$output
		);
		$this->assertContains(
			'-- Importing "bird dance" ; Url: http://glorf.com/videos/q34343.com; Tags:',
			$output
		);
		$this->assertContains(
			'-- --Invalid--Skipping--',
			$output
		);
	}
}