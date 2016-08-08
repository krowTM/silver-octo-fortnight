<?php

namespace VideoImporter\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use VideoImporter\Factory\ConfigurationFactory;
use VideoImporter\Factory\DataLoaderFactory;
use VideoImporter\Factory\DataParserFactory;
use VideoImporter\Logger\LoggerOutput;
use VideoImporter\Factory\DataPersistenceFactory;
use VideoImporter\ImportProcess;

class ImportVideosCommand extends Command
{
    /**
     * Sets command options.
     */
    protected function configure()
    {
        $this
            ->setName('import')
            ->setDescription('Command line script to import videos.')
            ->setHelp('This command allows you to import videos.')
            ->addArgument(
                'source_name',
                InputArgument::REQUIRED, 'The name of the source.'
            )
        ;
    }

    /**
     * Executes command.
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            '',
            'Video Importer',
            '==============',
            '',
        ]);

        $logger = new LoggerOutput($output);
        $logger->log([
            'Importing videos from: '.$input->getArgument('source_name'),
            '==============',
            '',
        ]);

        $configuration = ConfigurationFactory::get(
            $input->getArgument('source_name')
        );
        $data_loader = DataLoaderFactory::get($configuration);
        $data_parser = DataParserFactory::get($configuration)->setData(
            $data_loader->load()
        );
        $persistance = DataPersistenceFactory::get('mysql')->setLogger(
            $logger
        );

        $import_process = new ImportProcess(
            $data_parser,
            $logger,
            $persistance
        );
        $import_process->run();

        $logger->log([
            '',
            'Done.',
            '==============',
            '',
        ]);
    }
}
