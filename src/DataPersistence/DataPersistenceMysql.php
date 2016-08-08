<?php

namespace VideoImporter\DataPersistence;

use VideoImporter\Logger\LoggerInterface;
use VideoImporter\Model\Video;

class DataPersistenceMysql implements DataPersistenceInterface
{
    private $logger;

    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;

        return $this;
    }

    public function save(Video $video)
    {
        $this->logger->log('-- Saving "'.$video->name.'"');
    }
}
