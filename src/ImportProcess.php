<?php

namespace VideoImporter;

use VideoImporter\DataLoader\DataLoaderInterface;
use VideoImporter\DataParser\DataParserInterface;
use VideoImporter\Logger\LoggerInterface;
use VideoImporter\DataPersistence\DataPersistenceInterface;
use VideoImporter\Model\Video;

class ImportProcess
{
    private $data_parser;
    private $logger;
    private $persistance;

    public function __construct(
            DataParserInterface $data_parser,
            LoggerInterface $logger,
            DataPersistenceInterface $persistance)
    {
        $this->data_parser = $data_parser;
        $this->logger = $logger;
        $this->persistance = $persistance;
    }

    /**
     * Maps each video from the array returned by the parser
     * to a Video object, validates it and saves it to DB.
     */
    public function run()
    {
        foreach ($this->data_parser->parse() as $parsed_vid) {
            $video = new Video();
            DataMapper::map($parsed_vid, $video);

            $this->logger->log(
                '-- Importing "'.$video->name.'" ; Url: '.$video->url.
                '; Tags: '.$video->tags
            );
            if (!$video->validate()) {
                $this->logger->log('-- --Invalid--Skipping--');
                continue;
            }

            $this->persistance->save($video);
        }
    }
}
